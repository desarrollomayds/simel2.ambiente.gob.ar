<?php
/*********************************************\
* Mini Paginator                              *
* Made by Wilson Fernandez for multicoders.com*
* wilsonimport@gmail.com                      *
\*********************************************/
class Paginator {
    
    private $total_results;
    private $maximum_per_page;
    private $total_pages;
    private $maximum_links;
    private $current_page;
	private $pagination;
	public $limit;
    
    public function paginate($total_results, $maximum_per_page = NULL, $maximum_links = NULL, $style = "Light")
    {
        $config = new config;

        if (is_null($maximum_per_page)) {
            $maximum_per_page = $config->getParameters("framework::paginador::resultados_por_pagina");
        }
        
        if (is_null($maximum_links)) {
            $maximum_links = $config->getParameters("framework::paginador::cantidad_links");
        }

        $this->maximum_per_page = $maximum_per_page;
        $this->maximum_links = $maximum_links;

        $this->total_results  = $total_results;
        $this->total_pages  = ceil($this->total_results / $this->maximum_per_page);
        $this->maximum_links = $maximum_links / 2;
		
		// Dynamic styling
		switch ($style) {
    		case "Light":
    			$style_main = "pagination_paginator";
    			$style_active = "page_paginator active";
    			$style_page = "page_paginator";
    			break;
    		case "Dark":
    			$style_main = "pagination_paginator dark";
    			$style_active = "page_paginator dark active";
    			$style_page = "page_paginator dark";
    			break;
    		default:
    			$style_main = "pagination_paginator";
    			$style_active = "page_paginator active";
    			$style_page = "page_paginator";
    			break;
		}
		
        // If not detected "current_page" means we are on page one
        if ($_GET["current_page"] AND is_numeric($_GET["current_page"])) {
            $this->current_page = $_GET["current_page"];
        } else {
            $this->current_page = 1;
        }
		
		// Object containing the clause limit
		$this->limit = $this->maximum_per_page * $this->current_page - $this->maximum_per_page.",".$this->maximum_per_page;
        
        $offset_izq = ($this->current_page - $this->maximum_links) < 0 ? $this->current_page - $this->maximum_links : 0;
        $offset_der = ($this->total_pages - $this->current_page) < $this->maximum_links ? $this->maximum_links - ($this->total_pages - $this->current_page) : 0;
        
		$this->pagination ="<link href='paginator/style.css' rel='stylesheet'><div id='container_paginator'><div class='".$style_main."'>";
		
        // we want to keep url parameters when using pagination
        parse_str($_SERVER['QUERY_STRING'], $query_params);

        // Left Arrow
        if ($this->current_page == 1) {
            $this->pagination.= "<div class='".$style_active."'> Anterior </div>";
        } else {
            $query_params['current_page'] = $this->current_page - 1;
            $this->pagination.= " <a href='" . $_SERVER['PHP_SELF'] . "?".http_build_query($query_params)."' class='".$style_page."'> Anterior </a> ";
        }
        
        // Loop that makes the links
        for ($i = 1; $i <= $this->total_pages; $i++) {
            if ($i <= ($this->current_page - $this->maximum_links) - $offset_der || $i > ($this->current_page + $this->maximum_links) - $offset_izq) {
                continue;
            }
            
            // Condition that makes or not the link to the current page
            if ($i == $this->current_page) {
                $this->pagination.= " <div class='".$style_active."'>" .$i. "</div>";
            } else {
                $query_params['current_page'] = $i;
                $this->pagination.= " <a href='" . $_SERVER['PHP_SELF'] . "?".http_build_query($query_params)."' class='".$style_page."'>" . $i . "</a> ";
            }
        }
        
        // Right arrow
        if ($this->current_page == $this->total_pages) {
            $this->pagination.= " <div class='".$style_active."'> Siguiente </div>";
        } else {
            $query_params['current_page'] = $this->current_page + 1;
            $this->pagination.= " <a href='" . $_SERVER['PHP_SELF'] . "?".http_build_query($query_params)."' class='".$style_page."'> Siguiente </a> ";
        }
		
		$this->pagination.= "</div></div>";
		
		return $this->pagination;
    }
}
?>