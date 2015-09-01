<?php

namespace App\Controllers;

use Modules\Category\Entities\Category;
use Modules\Knowledge\Entities\Knowledge;
use Modules\Post\Entities\Post;
use Modules\Product\Entities\Product;
use Modules\Media\Entities\Media;
use Modules\Text\Entities\Text;

/**
 * Class ImportController
 * @package App\Controllers
 */
class ImportController extends \Controller
{
    /**
     * @var Product
     */
    private $product;
    /**
     * @var Media
     */
    private $media;
    /**
     * @var Category
     */
    private $category;
    /**
     * @var Text
     */
    private $texts;
    /**
     * @var Knowledge
     */
    private $knowledge;
    /**
     * @var Post
     */
    private $post;

    public function __construct(Product $product, Media $media, Category $category, Text $texts, Knowledge $knowledge, Post $post)
    {
        $this->product = $product;
        $this->media = $media;
        $this->category = $category;
        $this->texts = $texts;
        $this->knowledge = $knowledge;
        $this->post = $post;
    }

    private $knowledges = [
        // application failures
        57 => 134,
        // operating failures
        58 => 135,
        // operating-application failures
        59 => 136

    ];

    /*public function importKnowledgeToCn()
    {
        $knowledge = $this->knowledge->whereIn('category_id', [57, 58, 59])->get();
        foreach($knowledge as $know){
            $data = [
                'title' => $know->title,
                'content' => $know->content,
                'causes' => $know->causes,
                'prevention' => $know->prevention,
                'repair' => $know->repair,
                'movie' => $know->movie,
                'category_id' => $this->knowledges[$know->category_id]
            ];
            $this->knowledge->create($data);
        }
    }*/

/*    public function importNewsToCn()
    {
        $posts = $this->post->where('category_id', 36)->get();
        foreach($posts as $post){
            $data = [
                'title' => $post->title,
                'photo' => "",
                'content' => $post->content,
                'category_id' => 143,
                'tags' => $post->tags,
                'badges' => $post->badges,
                'parameters' => $post->parameters,
            ];
            $this->post->create($data);
        }
    }*/

    /**
     * Import produktów ze starego novolu.
     */
    public function importProducts()
    {
        $this->insertProducts();
    }

    private function getCategoryLangId($novol_id)
    {
        // en
        $cats_en = [
            // szpachlowki
            26 => 192,
            // podklady i lakiery
            163 => 193,
            // Lakiery
            27 => 194,
            // podklady
            30 => 195,
            // spray
            29 => 196,
            // Lakiery
            167 => 197,
            // srodek ochrony karoserii
            169 => 306,
            // Podklady
            168 => 198,
            // Inne
            305 => 199,
            // gravit
            183 => 204,
            // plus
            184 => 202,
            // thin
            185 => 203
        ];
        // fr
        $cats_fr = [
            // szpachlowki
            26 => 253,
            // podklady i lakiery
            163 => 254,
            // Lakiery
            27 => 255,
            // podklady
            30 => 256,
            // spray
            29 => 257,
            // Lakiery
            167 => 258,
            // srodek ochrony karoserii
            169 => 308,
            // Podklady
            168 => 259,
            // Inne
            305 => 260,
            // gravit
            183 => 264,
            // plus
            184 => 262,
            // thin
            185 => 263
        ];
        // de
        $cats_de = [
            // szpachlowki
            26 => 222,
            // podklady i lakiery
            163 => 223,
            // Lakiery
            27 => 224,
            // podklady
            30 => 225,
            // spray
            29 => 226,
            // Lakiery
            167 => 227,
            // srodek ochrony karoserii
            169 => 307,
            // Podklady
            168 => 228,
            // Inne
            305 => 229,
            // gravit
            183 => 233,
            // plus
            184 => 231,
            // thin
            185 => 232
        ];
        // de
        $cats_ru = [
            // szpachlowki
            26 => 329,
            // podklady i lakiery
            163 => 330,
            // Lakiery
            27 => 331,
            // podklady
            30 => 332,
            // spray
            29 => 333,
            // Lakiery
            167 => 334,
            // srodek ochrony karoserii
            169 => 335,
            // Inne
            305 => 336,
            // gravit
            183 => 340,
            // plus
            184 => 338,
            // thin
            185 => 339
        ];
        $productFist = $this->product->where("novol_id", $novol_id)->orderBy("id", "ASC")->first();
        foreach($productFist->category as $category){
            return (isset($cats_de[$category->id])) ? $cats_de[$category->id] : null;
        }
    }

    private function insertProducts()
    {
        $products = \DB::connection('mysql2')->select('SELECT * FROM novol2011_de_nekk');
        // tabela produktów
        foreach ($products as $k => $product) {
            $productTable = array();
            $productTable['novol_id'] = $product->id;
            $productTable['name'] = $product->nazwa;
            $productTable['description'] = $product->opis;
            $productTable['brief'] = $product->hasla;
            $productTable['tech_card'] = $product->k_tech;
            $productTable['char_card'] = $product->k_bezp;
            $productTable['voc'] = $product->VOC;
            if($productModel = $this->product->create($productTable)){
                if($this->getCategoryLangId($product->id) != null){
                    $productPivot = [];
                    $productPivot['category_id'] = $this->getCategoryLangId($product->id);
                    $productModel->category()->attach($productPivot);
                }

                $productPivot = [];
                $mediaIds = $this->insertMedia($product);
                foreach($mediaIds as $k => $id){
                    $productPivot = [];
                    if(!empty($id['id'])){
                        $index = $k+1;
                        $productPivot[$id['id']] = [
                            'title' => "Dodatkowy plik {$index}",
                            'content' => ($id['content'] == false) ? "" : $id['content']
                        ];
                    }
                }
                if(!empty($productPivot)){
                    $productModel->media()->sync($productPivot);
                    $productModel->push();
                }

                $productPivot = [];
                $ghsIds = $this->insertGhs($product);
                foreach($ghsIds as $k => $id){
                    $productPivot = [];
                    if(!empty($id['id'])){
                        $index = $k+1;
                        $productPivot[$id['id']] = [];
                    }
                }
                if(!empty($productPivot)){
                    $productModel->ghs()->sync($productPivot);
                    $productModel->push();
                }
            }
        }
        return true;
    }

    private function getMediaOrInsert($name, $data, $productDesc, $ghs = true){
        $prod = $this->media->where("realname", $name)->first();
        if(!empty($prod)){
            $data = [];
            $data["id"] = $prod->id;
            if(!$ghs) {
                $data["content"] = ($productDesc == false) ? "" : $productDesc;
            }
            return $prod;
        }
        $inserted = $this->media->create($data);
        $data["id"] = $inserted->id;
        if(!$ghs){
            $data["content"] = ($productDesc == false) ? "" : $productDesc;
        }
        return $data;
    }

    private function insertMedia($product)
    {
        $res = [];
        if(!empty($product->inne1)){
            $nameArr = explode(".", $product->inne1);
            $data = [
                'name' => $product->inne1,
                'realname' => $product->inne1,
                'type' => end($nameArr),
            ];
            $res[] = $this->getMediaOrInsert($product->inne1, $data, $product->opis1, false);
        }
        if(!empty($product->inne2)){
            $nameArr = explode(".", $product->inne2);
            $data = [
                'name' => $product->inne2,
                'realname' => $product->inne2,
                'type' => end($nameArr),
            ];
            $res[] = $this->getMediaOrInsert($product->inne2, $data, $product->opis2, false);
        }
        if(!empty($product->inne3)){
            $nameArr = explode(".", $product->inne3);
            $data = [
                'name' => $product->inne3,
                'realname' => $product->inne3,
                'type' => end($nameArr),
            ];
            $res[] = $this->getMediaOrInsert($product->inne3, $data, $product->opis3, false);
        }

        return $res;
    }

    private function insertGhs($product)
    {
        $res = [];
        if(!empty($product->ghs1)){
            $nameArr = explode(".", $product->ghs1);
            $data = [
                'name' => $product->ghs1,
                'realname' => $product->ghs1,
                'type' => end($nameArr),
            ];
            $res[] = $this->getMediaOrInsert($product->ghs1, $data, false);
        }

        if(!empty($product->ghs2)){
            $nameArr = explode(".", $product->ghs2);
            $data = [
                'name' => $product->ghs2,
                'realname' => $product->ghs2,
                'type' => end($nameArr),
            ];
            $res[] = $this->getMediaOrInsert($product->ghs2, $data, false);
        }

        if(!empty($product->ghs3)){
            $nameArr = explode(".", $product->ghs3);
            $data = [
                'name' => $product->ghs3,
                'realname' => $product->ghs3,
                'type' => end($nameArr),
            ];
            $res[] = $this->getMediaOrInsert($product->ghs3, $data, false);
        }

        return $res;
    }

    private function getCategoryFromNumber($number)
    {
        /*
        pl:
        1 0 - szpachlówki - 26
        2 0 - lakiery - 27
        3 0 - gravit - 28
        4 0 - spray - 29

        2 1 - podkłady - 30
        3 1 - plus - 31
        3 2- thin - 32
        3 3 - pozostałem materiały uzup. (non-paint) - 33

        en:
        1 0 - szpachlówki - 192
        2 0 - lakiery - 194
        3 0 - gravit - 28
        4 0 - spray - 29

        2 1 - podkłady - 195
        3 1 - plus - 31
        3 2- thin - 32
        3 3 - pozostałem materiały uzup. (non-paint) - 33
         */
        $maincat = substr($number, 0, 1);
        $subcat = substr($number, 1);

        $maincats = array(
            "1" => 26,
            "2" => 27,
            "3" => 28,
            "4" => 29
        );

        $subcats = array(
            "21" => 30,
            "31" => 31,
            "32" => 32,
            "33" => 33
        );
        // nalezy do kategorii glownej
        if ($maincat != "0" && $subcat == "0") {
            return $maincats[$maincat];
        }
        // nalezy do subkategorii
        if ($maincat != "0" && $subcat != "0") {
            return $subcats[$number];
        }
    }
}

