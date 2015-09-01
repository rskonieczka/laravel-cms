<?php

use Modules\Knowledge\Entities\Knowledge;
Use Modules\Site\Entities\Site;
Use Modules\Category\Entities\Category;

function templatesList()
{
    $themes = \File::directories(app_path() . '/themes');
    $themes = array_map('basename', $themes);
    foreach ($themes as $theme) {
        $files = \File::files(app_path() . '/themes/' . $theme . '/templates');
        $files = array_map('basename', $files);
        foreach ($files as $file) {
            $file = preg_replace("/\\.blade.php/", "", $file);
            $filesSelect[$theme . '.' . $file] = $theme . ' &raquo; ';
            $filesSelect[$theme . '.' . $file] .= preg_replace("/\\.blade.php/", "", $file);
        }
        // get folders
        if (file_exists(app_path() . '/themes/' . $theme . '/templates')) {
            $folders = \File::directories(app_path() . '/themes/' . $theme . '/templates');
            if (!$folders)
                continue;
            $folders = array_map('basename', $folders);
            foreach ($folders as $folder) {
                $files = \File::files(app_path() . '/themes/' . $theme . '/templates/' . $folder);
                $files = array_map('basename', $files);
                foreach ($files as $file) {
                    $file = preg_replace("/\\.blade.php/", "", $file);
                    $filesSelect[$theme . '.' . $folder . '.' . $file] = $theme . ' &raquo; ' . $folder . ' &raquo; ';
                    $filesSelect[$theme . '.' . $folder . '.' . $file] .= preg_replace("/\\.blade.php/", "", $file);
                }
            }
        }
    }
    return $filesSelect;
}

function renderText($texts, $key, $key2, $returnBoolean = false)
{
    if (@property_exists($texts, $key)) {
        return ( $returnBoolean ) ? true : $texts->{$key}->{$key2};
    }
    return ( $returnBoolean ) ? false : $key . '.' . $key2;
}

function renderImage($baseUrl, $photo, $present, $extra = false, $crop = true)
{
    if (File::exists('./uploads/' . $baseUrl . $photo) && !empty($photo)) {
        if (!$crop) {
            $url = asset('uploads/' . $baseUrl . $photo);
            return $url;
        } else {
            return Imagecache::get($baseUrl . $photo, $present, $extra)->img_nosize;
        }
    }
}

function getLink($link)
{
    if (substr($link, 0, 7) === "http://" || substr($link, 0, 8) === "https://") {
        return URL::to($link);
    }
	$link = str_replace("//", "/", trans('common.lang_prefix') . $link);
    return URL::to($link);
}

function imgAsset($theme, $image)
{
    if (File::exists("./assets/{$theme}/img/{$image}")) {
        return asset("assets/{$theme}/img/{$image}");
    }
    return false;
}


function branchIsActive($tree, $currentParentSlug, $treeProducts = false, $product = false)
{
    // we search for path $path in our tree
    $currentSlug = Request::path();

    // CASE 1
    if ($currentParentSlug == $currentSlug)
        return true;

    if($product){
        if (trans('routes.product_list').$product->product_id.'/'.\Slugify::slugify($product->name) == $currentSlug) {
            return true;
        }
    }

    if($treeProducts){
        if(searchProductBranch($treeProducts, $currentSlug)){
            return true;
        }
    }

    if (!$tree)
        return false;


    // CASE 2]
    foreach ($tree as $branch) {
        if (slugWithLangPrefix($branch->slug) == $currentSlug) {
            return true;
        }else{
            if(searchBranch($branch, $currentSlug)){
                return true;
            }
            if(searchProductBranch($branch, $currentSlug)){
                return true;
            }

        }

    }
    return false;
}

function slugWithLangPrefix($slug)
{
    if(\App::getLocale() != 'pl')
        return \App::getLocale().'/'.$slug;
    else
        return $slug;
}

function searchBranch($tree, $currentSlug)
{
    if(searchProductBranch($tree, $currentSlug)){
        return true;
    }
    if(isset($tree['childs'])){
        foreach ($tree['childs'] as $branch) {
            if (Request::segment(2) == $branch->slug){
                return true;
            }
            if (slugWithLangPrefix($branch->slug) == $currentSlug) {
                return true;
            }else{
                if(searchProductBranch($tree, $currentSlug)){
                    return true;
                }
                if(searchBranch($branch, $currentSlug)){
                    return true;
                }
            }
        }
        return false;
    }
}

function searchProductBranch($tree)
{
    // we search for path $path in our tree
    $currentSlug = Request::path();

    if(isset($tree->products)){
        foreach ($tree['products'] as $product) {
            if (trans('routes.product_list').$product->product_id.'/'.\Slugify::slugify($product->name) == $currentSlug) {
                return true;
            }
        }
        return false;
    }
}


function searchKnowledgeBranch($tree)
{
    // we search for path $path in our tree
    $currentSlug = Request::path();

    if(isset($tree->products)){
        foreach ($tree['products'] as $product) {
            if (trans('routes.product_list').$product->product_id.'/'.\Slugify::slugify($product->name) == $currentSlug) {
                return true;
            }
        }
        return false;
    }
}

function getSiteDomainByName($plural)
{
	$currentSite = Site::where('name', $plural)->first();
	if(isset($currentSite->domain)){
		return $currentSite->domain;
	}
}

/**
 * @param $categoryId
 * @return bool
 */
function ifBranchHaveKnowledges($categoryId, $isKnowledge)
{
    if(!$isKnowledge)
        return false;

    $categories = Category::where('parent', $categoryId)->get();
    if(count($categories) > 0){

        foreach($categories as $category){
            $knowledges = Knowledge::where('category_id', $category->id)->get();
            if(count($knowledges) > 0){
                return true;
            }
        }
    }
    return false;
}


function isExternal($link)
{
    if(substr($link, 0, 7) == 'http://' || substr($link, 0, 8) == 'https://'){
        return true;
    }
    return false;
}

function renderCardLink($dir, $fileName, $langPrefix)
{
    if (File::exists('./'.$dir.$langPrefix.$fileName))
    {
        return URL::to($dir.$langPrefix.$fileName);
    }else{
        return URL::to($dir.$fileName);
    }
}
