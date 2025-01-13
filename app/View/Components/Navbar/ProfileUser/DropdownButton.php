<?php

namespace App\View\Components\Navbar\ProfileUser;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DropdownButton extends Component
{
    public $class = "";
    public bool $iconbutton;
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $url,
        public $text,
        public $icon = null,
        public $hasarrow = false,
        public $functional = false
    ) {
        $this->url = $url;
        $this->text = $text;
        $this->icon = $icon;
        $this->iconbutton = $icon !== null;
        $this->hasarrow = $hasarrow;

        //? Change the class based on the icon button
        if(!$this->iconbutton)
        {
            $this->class = "block dark:text-gray-300 dark:text-gray-400";
        }
        else
        {
            $this->class = "flex items-center";
        }
    }

    /**
     * Wheter the component should be rendered.
     */
    public function shouldRender()
    {
        return $this->functional;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar.profile-user.dropdown-button');
    }
}
