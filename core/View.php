<?php /** @noinspection PhpIncludeInspection */

/** @noinspection PhpIncludeInspection */


namespace app\core;


class View
{
    public string $title = '';

    public function renderView($view, $crumbs = []): array|bool|string
    {
        $viewContent = $this->renderViewContent($view, $crumbs);
        $layoutContent = $this->layoutContent();

        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function renderViewContent($view, $crumbs): bool|string
    {
        foreach ($crumbs as $k => $val) {
            // if $k evaluates as name, $$k evans as var name
            $$k = $val;
        }

        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";

        return ob_get_clean();
    }

    public function layoutContent(): bool|string
    {
        $layout = Application::$app->layout;
        if (Application::$app->controller) {
            $layout = Application::$app->controller->layout;
        }

        ob_start();

        include_once Application::$ROOT_DIR . "/views/layouts/_$layout.php";

        return ob_get_clean();
    }

//    public function renderContent($content)
//    {
//        $layoutContent = $this->layoutContent();
//
//        return str_replace('{{content}}', $content, $layoutContent);
//    }
}