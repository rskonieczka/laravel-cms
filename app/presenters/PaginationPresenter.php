<?php namespace App\Presenters;

use Illuminate\Pagination\Presenter;

class PaginationPresenter extends Presenter {

    /**
     * Get the previous page pagination element.
     *
     * @param  string  $text
     * @return string
     */
    public function getPrevious($text = '<i class="fa fa-angle-left"></i>')
    {
        // If the current page is less than or equal to one, it means we can't go any
        // further back in the pages, so we will render a disabled previous button
        // when that is the case. Otherwise, we will give it an active "status".
        if ($this->currentPage <= 1)
        {
            return $this->getDisabledTextWrapper($text);
        }

        $url = $this->paginator->getUrl($this->currentPage - 1);

        //return $this->getPageLinkWrapper($url, $text, 'prev');
        return false;
    }

    /**
     * Get the next page pagination element.
     *
     * @param  string  $text
     * @return string
     */
    public function getNext($text = '<i class="fa fa-angle-right"></i>')
    {
        // If the current page is greater than or equal to the last page, it means we
        // can't go any further into the pages, as we're already on this last page
        // that is available, so we will make it the "next" link style disabled.
        if ($this->currentPage >= $this->lastPage)
        {
            return $this->getDisabledTextWrapper($text);
        }

        $url = $this->paginator->getUrl($this->currentPage + 1);

        //return $this->getPageLinkWrapper($url, $text, 'next');
        return false;
    }

    /**
     * Get HTML wrapper for active text.
     *
     * @param  string  $text
     * @return string
     */
    public function getActivePageWrapper($text)
    {
        //return '<li class="current"><a href="">'.$text.'</a></li>';
        return '<li class="active"><a href="">'.$text.'</a></li>';
    }

    /**
     * Get HTML wrapper for disabled text.
     *
     * @param  string  $text
     * @return string
     */
    public function getDisabledTextWrapper($text)
    {
        //return '<li class="unavailable"><a href="">'.$text.'</a></li>';
        return false;
    }

    /**
     * Get HTML wrapper for a page link.
     *
     * @param  string  $url
     * @param  int  $page
     * @param  string  $rel
     * @return string
     */
    public function getPageLinkWrapper($url, $page, $rel = null)
    {
        //return '<li><a href="'.$url.'">'.$page.'</a></li>';
        return '<li><a href="'.$url.'">'.$page.'</a></li>';
    }

}