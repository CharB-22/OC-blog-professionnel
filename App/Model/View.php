<?php

class View 
{
    // Name of the file linked to the view
    private $file;
    // Name of the title - defined in the view file
    private $title;

    public function __construct($route)
    {
        $this->file = "App\View\\".$route."View.php";
    }

    // Put together the elements of the view
    public function generateContent($data)
    {
        // Put together the template with customed content
        $content = $this->createView($this->file, $data);

        // Assemble the customed content to the generic layout
        $finalView = $this->createView("App\View\Layout.php", array("title"=> $this->title, "content" => $content));

        echo $finalView;
    }

    // Generate the view file 
    private function createView($file, $data)
    {
        if(file_exists($file))
        {
            extract($data);

            ob_start();

            require $file;

            return ob_get_clean();
        }
        else
        {
            throw new Exception("Le fichier ". $file . " est introuvable.");
        }

    }
}