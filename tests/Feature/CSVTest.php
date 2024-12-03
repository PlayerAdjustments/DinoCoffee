<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;
use App\Imports\UsersImport;
use App\Models\User;

class CSVTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $user = User::factory()->withRole('DEV')->create();
        $this->actingAs($user);
    }

    public function test_store_csv_success()
    {
        Storage::fake('CSV/uploads');
        $file = UploadedFile::fake()->create('users.csv');

        Excel::fake();

        $response = $this->post(route('developer.users.storeCSV'), [
            'file' => $file,
        ]);

        $response->assertRedirect(route('developer.users.uploadCSV'));
        $response->assertSessionHas('Success', 'Users uploaded successfuly!');

        Storage::assertExists('CSV/uploads/users_' . now()->format('d_m_Y_H_i_s') . '.csv');
        Excel::assertImported('CSV/uploads/users_' . now()->format('d_m_Y_H_i_s') . '.csv');
    }

    public function test_store_csv_import_validation_error()
    {
        Storage::fake('CSV/uploads');
        $file = UploadedFile::fake()->create('users.csv');
        
        $response = $this->post(route('developer.users.storeCSV'), [
            'file' => $file,
        ]);

        $response->assertRedirect(route('developer.users.uploadCSV'));
    }

    /**
     * Test if the XLSX file is downloaded when going to the downloadCSV route.
     *
     * @return void
     */
    public function testXlsxFileDownload()
    {

        // Perform a GET request to the route (ensure the route name is correct)
        $response = $this->get(route('developer.users.downloadCSV'));

        // Assert the response is a download (the file content-disposition should be 'attachment')
        $response->assertHeader('Content-Disposition', 'attachment; filename=plantilla_usuarios.xlsx');

        // Assert the response has the correct content type (MIME type for XLSX)
        $response->assertHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        // Optionally, you can also test the file's content
        // This ensures the file is being generated, but won't check its internal structure
        $response->assertSuccessful();

        // If you need to verify the file content, you can save the file and use assertions
        $response->assertDownload();
    }

}
