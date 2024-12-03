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

        Excel::fake();

        Excel::shouldReceive('import');
        

        $response = $this->post(route('developer.users.storeCSV'), [
            'file' => $file,
        ]);

        $response->assertRedirect(route('developer.users.uploadCSV'));
        $response->assertSessionHas('error', 'We could not import the file');
        $response->assertSessionHas('csv_import_errors');
    }

    public function test_download_csv_success()
    {
        $filePath = storage_path('app/CSV/plantilla_usuarios.xlsx');
        Storage::put('CSV/plantilla_usuarios.xlsx', 'dummy content');

        $response = $this->get(route('developer.users.downloadCSV'));

        $response->assertStatus(200);
        $response->assertDownload('plantilla_usuarios.xlsx');
    }

    public function test_download_csv_file_not_found()
    {
        $response = $this->get(route('developer.users.downloadCSV'));

        $response->assertStatus(404);
        $response->assertSee('File not found.');
    }
}
