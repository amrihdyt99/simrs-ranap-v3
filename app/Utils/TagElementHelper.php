<?php

namespace App\Utils;

use App\Traits\NanoIDTraits;

class TagElementHelper
{
    use NanoIDTraits;

    /**
     * Create ul list from array
     * @param string $caption
     * @param string[] $data an array of string
     * @return tag <ul> with <li> elements
     */
    public function createList($caption, $data)
    {

        $list = "<h6>$caption</h6><ul>";
        foreach ($data as $item) {
            $list .= "<li>$item</li>";
        }
        $list .= "</ul>";
        return $list;
    }

    /**
     * Create table from array
     * @param string $caption
     * @param string[] $columns an array of string
     * @param string[][] $rows an array of array of string
     * @return tag <table> with <tr> and <td> elements
     */
    public function createTable($caption, $columns, $rows)
    {
        $table = "<div class='w-100 table-responsive'>";
        $table .= "<table class='table table-bordered table-responsive w-100 table-hover table-sm'><caption>$caption</caption><thead><tr>";
        foreach ($columns as $column) {
            $table .= "<th>$column</th>";
        }
        $table .= "</tr></thead><tbody>";
        foreach ($rows as $row) {
            $table .= "<tr>";
            foreach ($row as $cell) {
                $table .= "<td>$cell</td>";
            }
            $table .= "</tr>";
        }
        $table .= "</tbody></table>";
        $table .= "</div>";
        return $table;
    }


    /**
     * Create Bootstrap Collapse
     * @link https://getbootstrap.com/docs/4.6/components/collapse/
     * @param string $caption
     * @param string $tag_element
     * @return tag <div> with class="collapse" and <button> elements
     */
    public function createBootstrapCollapse($caption, $tag_element)
    {
        $id = $this->generateID();
        $collapse = "<div class='collapse' id='$id'>" . $tag_element . "</div>";
        $button = "<button class='btn btn-primary' type='button' data-toggle='collapse' data-target='#" . $id . "' aria-expanded='false' aria-controls='" . $id . "'>" . $caption . "</button>";
        return $collapse . $button;
    }

    public function createTitle($title)
    {
        return "<h6>" . $title . "</h6>";
    }


    /**
     * Create Flex Row
     * @param string $caption
     * @param  $child_element an array of string or html element
     * @return tag <div> with class="d-flex" and <div> elements
     */
    public function createFlexRow($caption, $child_element)
    {
        $flex = $this->createTitle($caption);
        $flex .= "<div class='w-100 d-flex flex-row flex-wrap' style='gap:24px;'>";
        foreach ($child_element as $element) {
            $flex .= "<div>$element</div>";
        }
        $flex .= "</div>";
        return $flex;
    }

    /**
     * Create Grid Row
     * @param string $caption
     * @param int $grid_count
     * @param  $child_element an array of string or html element
     * @return tag <div> with class="row" and <div> elements
     */
    public function createGridRow($caption, $grid_column, $child_element)
    {
        $grid = "<h6>$caption</h6>";
        $grid .= "<div class='row'>";
        foreach ($child_element as $element) {
            $grid .= "<div class='col-md-$grid_column'>$element</div>";
        }
        $grid .= "</div>";
        return $grid;
    }

    /**
     * Create Paragraph
     * @param string $text
     * @return tag <p> with text
     */
    public function createParagraph($text)
    {
        return "<p>$text</p>";
    }


    /**
     * Create Code JSON
     * @return tag <pre> with json
     */
    public function createCodeJson($caption, $data)
    {
        $json = json_encode($data, JSON_PRETTY_PRINT);
        $element = '<pre>' . $json . '</pre>';
        return $this->createBootstrapCollapse($caption, $element);
    }


    /**
     * Create Bootstrap Badge
     * @param string $severity is one of 'primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'
     * @param string $text is the text of the badge
     * @return tag <span> with class="badge badge-$severity" and text
     */
    public function createBootstrapBadge($severity, $text)
    {
        return "<span class='badge badge-$severity'>$text</span>";
    }

    /**
     * Create Bootstrap Blockquote
     * @param string $text
     * @param string $credit
     * @param string $align is one of 'left', 'right', 'center'
     * @return tag <blockquote> with <p> and <footer> elements
     */
    public function createBoostrapBlockquote($text, $credit, $align = 'left')
    {
        return "<blockquote class='blockquote text-" . $align . "'><p class='mb-0'>$text</p><footer class='blockquote-footer'>$credit</footer></blockquote>";
    }

    /**
     * Create Deleted Text
     * @param string $text
     * @return tag <del> with text
     */
    public function createDeletedText($text)
    {
        return "<del>$text</del>";
    }


    /**
     * Create underline text
     * @param string $text
     * @return tag <u> with text
     */
    public function createUnderlineText($text)
    {
        return "<u>$text</u>";
    }

    /**
     * Create strong text
     * @param string $text
     * @return tag <strong> with text
     */
    public function createBoldText($text)
    {
        return "<strong>$text</strong>";
    }

    /**
     * Create italic text
     * @param string $text
     * @return tag <em> with text
     */
    public function createItalicText($text)
    {
        return "<em>$text</em>";
    }
}
