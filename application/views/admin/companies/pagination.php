<?php

?>
<link rel="stylesheet" charset="UTF-8" href="<?php echo base_url();?>assets/css/pagination.css?_=<?php echo time();?>">

<div class="table-footer dataTables_paginate paging_simple_numbers">
    <?php
    /* Setup vars for query. */
    $page = 1;
    $page = $curpage;
    $adjacents = 4;
    if($page)
        $start = ($page - 1) * $pagesize; 		//first item to display on this page
    else
        $start = 0;								//if no page var is given, set start to 0


    /* Setup page vars for display. */
    if ($page == 0) $page = 1;					//if no page var is given, default to 1.
    $prev = $page - 1;							//previous page is page - 1
    $next = $page + 1;							//next page is page + 1
    $lastpage = $total_pages;
    $lpm1 = $lastpage - 1;						//last page minus 1


    $pagination = "";
    if($lastpage > 1)
    {
        $pagination .= '<div class="pagination">';
        //previous button
        if ($page > 1)
            $pagination.= '<a href="#" onclick="page_change(\'prev\');"><i class="mdi mdi-chevron-double-left"></i></a>';
        else
            $pagination.= '<span class="disabled"><i class="mdi mdi-chevron-double-left"></i></span>';

        //pages
        if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
        {
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= '<span class="current">'.$counter.'</span>';
                else
                    $pagination.= '<a href="#" onclick="page_change('.$counter.');">'.$counter.'</a>';
            }
        }
        elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
        {
            //close to beginning; only hide later pages
            if($page < 1 + ($adjacents * 2))
            {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if ($counter == $page)
                        $pagination.= '<span class="current">'.$counter.'</span>';
                    else
                        $pagination.= '<a href="#" onclick="page_change('.$counter.');">'.$counter.'</a>';
                }
                $pagination.= '<span class="ellipsis"> ... </span>';
                $pagination.= '<a href="#" onclick="page_change('.$lpm1.');">'.$lpm1.'</a>';
                $pagination.= '<a href="#" onclick="page_change('.$lastpage.');">'.$lastpage.'</a>';
            }
            //in middle; hide some front and some back
            elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
            {
                $pagination.= '<a href="#" onclick="page_change(1);">1</a>';
                $pagination.= '<a href="#" onclick="page_change(2);">2</a>';
                $pagination.= '<span class="ellipsis"> ... </span>';
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= '<span class="current">'.$counter.'</span>';
                    else
                        $pagination.= '<a href="#" onclick="page_change('.$counter.');">'.$counter.'</a>';
                }
                $pagination.= '<span class="ellipsis"> ... </span>';
                $pagination.= '<a href="#" onclick="page_change('.$lpm1.');">'.$lpm1.'</a>';
                $pagination.= '<a href="#" onclick="page_change('.$lastpage.');">'.$lastpage.'</a>';
            }
            //close to end; only hide early pages
            else
            {
                $pagination.= '<a href="#" onclick="page_change(1);">1</a>';
                $pagination.= '<a href="#" onclick="page_change(2);">2</a>';
                $pagination.= '<span class="ellipsis"> ... </span>';
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= '<span class="current">'.$counter.'</span>';
                    else
                        $pagination.= '<a href="#" onclick="page_change('.$counter.');">'.$counter.'</a>';
                }
            }
        }

        //next button
        if ($page < $counter - 1)
            $pagination.= '<a href="#" onclick="page_change(\'next\');" ><i class="mdi mdi-chevron-double-right"></i></a>';
        else
            $pagination.= '<span class="disabled"><i class="mdi mdi-chevron-double-right"></i></span>';
        $pagination.= '</div>';
    }

    echo $pagination;
    ?>
</div>
