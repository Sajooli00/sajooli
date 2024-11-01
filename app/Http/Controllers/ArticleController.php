<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Models\Article;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

    public function StoreArticle(StoreArticleRequest $storeArticleRequest)
    {
        $article = Article::create($storeArticleRequest->all());
        if($storeArticleRequest->hasFile('picture'))
        {
            $pictureUrl = Storage::putFile('/article',$storeArticleRequest->picture);
            $article->update([
                'Urlpicture'=>$pictureUrl
            ]);
        }


    }
        public function show($id)
        {
            $article =Article::find($id);
            if ($article == null)
            {
                return Response()->json(
                    [
                        'massage' => "مقاله مورد نظر پیدا نشد. حالا گمشو",
                    ]
                ,404);

            }
            else{
                return Response()->json(
                    [
                        "massage"=> "لیست مقالات با موفقیت دریافت شد. حال کن",
                        "data" => new ArticleResource($article)
                    ]);

            }
        }

    public function showList()
    {
        $articles =DB::table('articles')->simplePaginate(1);
        if ($articles == null)
        {
            return Response()->json(
                [
                   'massage'=>"متاسفانه مقاله هنوز ایجاد شده است.",
                ]
                ,404);
        }
        else{
            return Response()->json([
                "massage"=>"لیست مقالات با موفقیت دریافت شد",
                "data"=> ArticleResource::collection($articles)

                ]);
        }
        }
    }

