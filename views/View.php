<?php

/**
 * Displays template ordered by controllers. 
 */
class View 
{
    /**
     * Return a completed page. 
     * @param string $viewPath : path of the templates ordered by the controller. 
     * @param array $params : params from the controller
     * @return string
     */
    public function render(string $viewName, array $params = []) : void 
    {
        // gets the path of the file containing the structre of the page to display (without the params)
        $viewPath = $this->buildViewPath($viewName);
        // params used by the main template "main.php" that defines the structure of all pages
        $content = $this->_renderViewFromTemplate($viewPath, $params); // inputs params into the view
        //$title = $this->title;
        ob_start();//memorizes what's following and the content of the buffer ($content in the present case)
        require(MAIN_VIEW_PATH); // puts the view with the params into the main view (by calling $content in the buffer from main.php)
        echo ob_get_clean(); // gets all the data to display and cleans the memory 
    }
    
    /**
     * Create a view from a template. 
     * @param $viewPath : path ordered by the controller.
     * @param array $params : params sent by the controller to the template.
     * @throws Exception : if template doesn't exist.
     * @return string : content of the view.
     */
    private function _renderViewFromTemplate(string $viewPath, array $params = []) : string
    {  
        if (file_exists($viewPath)) {
            
            extract($params); // extracts data form the array "params" to transofme them in variables readable by the template.
            ob_start();
            require($viewPath);
            return ob_get_clean();
        } else {
            throw new Exception("La vue '$viewPath' est introuvable.");
        }
    }

    /**
     * Builds the path to the template
     * @param string $viewName.
     * @return string : path to the template.
     */
    private function buildViewPath(string $viewName) : string
    {
        return TEMPLATE_VIEW_PATH . $viewName . '.php';
    }
}



