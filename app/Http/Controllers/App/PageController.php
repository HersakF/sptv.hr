<?php

namespace App\Http\Controllers;

use App\Pages;
use App\Partners;
use App\Marketings;
use App\Schedules;
use Nathanmac\Utilities\Parser\Exceptions\ParserException;
use Psy\Exception\ParseErrorException;
use Validator;
use Mail;
use Session;
use FeedReader;
use Carbon\Carbon;
use Nathanmac\Utilities\Parser\Parser;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $currentPage                    = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app')->where('pages.category', '=', 'base')->get();
        $currentInfo                    = Pages::where('pages.category', '=', 'base')->first();
        $category                       = Pages::where('pages.category', '=', 'base')->first()->category;
        $mainNavigation                 = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('pages.page_id', '=', null)->where('pages.visibility', '=', '1')->where('pages.navigation', '=', 'main')->orderBy('pages.hierarchy', 'asc')->get();

        $abouts                         = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'about')->where('page_id', '=', null)->where('pages.visibility', '=', '1')->get();
        $termsOfUse                     = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'locations_app')->where('category', '=', 'terms-of-use')->where('page_id', '=', null)->where('pages.visibility', '=', '1')->get();

        $livestreams                    = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'livestream')->where('page_id', '=', null)->where('pages.visibility', '=', '1')->get();

        $shows                          = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'shows')->where('page_id', '=', null)->where('pages.visibility', '=', '1')->orderBy('hierarchy', 'asc')->get();
        $showArticles                   = [];
        foreach ($shows as $item){
            if($item->sortability == 1) {
                $showArticles           = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'shows')->where('page_id', '!=', null)->where('pages.visibility', '=', '1')->orderBy('hierarchy', 'asc')->limit(6)->get();
            } else {
                $showArticles           = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'shows')->where('page_id', '!=', null)->where('pages.visibility', '=', '1')->orderBy('id', 'desc')->limit(6)->get();
            }
        }

        $news                           = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'news')->where('page_id', '=', null)->where('pages.visibility', '=', '1')->orderBy('id', 'desc')->get();
        $newsArticles                   = [];
        $newsArticlesOther              = [];
        foreach ($news as $item) {
            if ($item->sortability == 1) {
                $newsArticles           = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'news')->where('page_id', '!=', null)->where('pages.visibility', '=', '1')->orderBy('hierarchy', 'asc')->limit(3)->get();
                $newsArticlesOther      = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'news')->where('page_id', '!=', null)->where('pages.visibility', '=', '1')->orderBy('hierarchy', 'asc')->skip(3)->limit(5)->get();
            } else {
                $newsArticles           = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'news')->where('page_id', '!=', null)->where('pages.visibility', '=', '1')->orderBy('id', 'desc')->limit(3)->get();
                $newsArticlesOther      = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'news')->where('page_id', '!=', null)->where('pages.visibility', '=', '1')->orderBy('id', 'desc')->skip(3)->limit(5)->get();
            }
        }

        $stories                        = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'stories')->where('page_id', '=', null)->where('pages.visibility', '=', '1')->orderBy('id', 'desc')->get();
        $storiesArticles                = [];
        foreach ($stories as $item){
            if($item->sortability == 1) {
                $storiesArticles        = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'stories')->where('page_id', '!=', null)->where('pages.visibility', '=', '1')->orderBy('hierarchy', 'asc')->limit(3)->get();
            } else {
                $storiesArticles        = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'stories')->where('page_id', '!=', null)->where('pages.visibility', '=', '1')->orderBy('id', 'desc')->limit(3)->get();
            }
        }

        $highlights                     = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'highlights')->where('page_id', '=', null)->where('pages.visibility', '=', '1')->orderBy('hierarchy', 'asc')->get();
        $highlightsArticles             = [];
        foreach ($highlights as $item){
            if($item->sortability == 1) {
                $highlightsArticles     = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'highlights')->where('page_id', '!=', null)->where('emitted_at', '<=', Carbon::now('Europe/Zagreb'))->where('pages.visibility', '=', '1')->orderBy('hierarchy', 'asc')->limit(3)->get();
            } else {
                $highlightsArticles     = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'highlights')->where('page_id', '!=', null)->where('emitted_at', '<=', Carbon::now('Europe/Zagreb'))->where('pages.visibility', '=', '1')->orderBy('emitted_at', 'desc')->limit(3)->get();
            }
        }

        $contacts                       = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'contact')->where('page_id', '=', null)->where('pages.visibility', '=', '1')->get();
        $partners                       = Partners::with('photos')->where('partners.visibility', '=', '1')->orderBy('hierarchy', 'asc')->get();
        $marketings                     = Marketings::with('photos')->where('marketings.visibility', '=', '1')->orderByRaw('RAND()')->get();
        $schedules                      = Schedules::where('schedules.visibility', '=', '1')->whereDate('date', '=', Carbon::today('Europe/Zagreb')->toDateString())->orderBy('time')->get();

        $parser = new Parser();

        try {
            $feedSportskaHrvatska       = $parser->xml(FeedReader::read('http://www.sportskahrvatska.hr/feed')->raw_data);
        } catch (ParserException $exception) {
            $feedSportskaHrvatska       = null;
        }

        try {
            $feedHrvatskaRepka          = $parser->xml(FeedReader::read('http://www.hrvatskareprezentacija.hr/feed/')->raw_data);
        } catch (ParserException $exception) {
            $feedHrvatskaRepka          = null;
        }

        if(empty($feedSportskaHrvatska)) {
            $feedSportskaHrvatska = null;
        }
        if(empty($feedHrvatskaRepka)) {
            $feedHrvatskaRepka = null;
        }

        return view('app.pages.'.$category, compact(
            'currentPage',
            'currentInfo',
            'mainNavigation',
            'abouts',
            'termsOfUse',
            'livestreams',
            'shows',
            'showArticles',
            'contacts',
            'news',
            'newsArticles',
            'newsArticlesOther',
            'stories',
            'storiesArticles',
            'highlights',
            'highlightsArticles',
            'partners',
            'marketings',
            'feedSportskaHrvatska',
            'feedHrvatskaRepka',
            'schedules'));
    }

    public function getPage(Request $request, $url)
    {
        $slug                           = preg_split("/\//", $url);
        $slug                           = array_last($slug);

        $loadedPage                     = [];
        $loadedPages                    = Pages::where('url', '=', $slug)->get();

        foreach ($loadedPages as $page) {
            if ($page->getAbsolutePath() == $url) {
                $loadedPage             = Pages::where('id', '=', $page->id)->first();
            }
        }

        if($loadedPage){
            $currentPage                    = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('pages.visibility', '=', '1')->where('pages.id', $loadedPage->id)->get();
            $currentInfo                    = Pages::where('pages.visibility', '=', '1')->where('pages.id', $loadedPage->id)->first();
        } else {
            return view('errors.404');
        }


        if(!empty($currentInfo)){
            $category                   = Pages::where('pages.visibility', '=', '1')->where('pages.url', $slug)->first()->category;
            $mainNavigation             = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('pages.page_id', '=', null)->where('pages.visibility', '=', '1')->where('pages.navigation', '=', 'main')->orderBy('pages.hierarchy', 'asc')->get();

            $news                       = [];
            $stories                    = [];
            $highlights                 = [];
            $shows                      = [];
            $programs                   = [];
            $termsOfUse                 = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'locations_app')->where('category', '=', 'terms-of-use')->where('page_id', '=', null)->where('pages.visibility', '=', '1')->get();

            if($currentInfo->sortability == 0) {
                $news                   = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'news')->where('page_id', '=', $currentInfo->id)->where('pages.visibility', '=', '1')->orderBy('id', 'desc')->paginate(9);
                $stories                = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'stories')->where('page_id', '=', $currentInfo->id)->where('pages.visibility', '=', '1')->orderBy('id', 'desc')->paginate(9);
                $highlights             = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'highlights')->where('page_id', '=', $currentInfo->id)->where('emitted_at', '<=', Carbon::now('Europe/Zagreb'))->where('pages.visibility', '=', '1')->orderBy('emitted_at', 'desc')->paginate(9);
                $shows                  = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'shows')->where('multiplicity', '=', '0')->where('pages.visibility', '=', '1')->orderBy('id', 'desc')->paginate(9);
                $programs               = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'programs')->where('multiplicity', '=', '0')->where('pages.visibility', '=', '1')->orderBy('id', 'desc')->get();
            } else {
                $news                   = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'news')->where('page_id', '=', $currentInfo->id)->where('pages.visibility', '=', '1')->orderBy('hierarchy', 'asc')->paginate(9);
                $stories                = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'stories')->where('page_id', '=', $currentInfo->id)->where('pages.visibility', '=', '1')->orderBy('hierarchy', 'asc')->paginate(9);
                $highlights             = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'highlights')->where('page_id', '=', $currentInfo->id)->where('emitted_at', '<=', Carbon::now('Europe/Zagreb'))->where('pages.visibility', '=', '1')->orderBy('hierarchy', 'asc')->paginate(9);
                $shows                  = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'shows')->where('multiplicity', '=', '0')->where('pages.visibility', '=', '1')->orderBy('hierarchy', 'asc')->paginate(9);
                $programs               = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'programs')->where('multiplicity', '=', '0')->where('pages.visibility', '=', '1')->orderBy('hierarchy', 'asc')->get();
            }

            $partners                   = Partners::with('photos')->where('partners.visibility', '=', '1')->orderBy('hierarchy', 'asc')->get();
            $marketings                 = Marketings::with('photos')->where('marketings.visibility', '=', '1')->orderByRaw('RAND()')->get();

            $schedules                  = Schedules::where('schedules.visibility', '=', '1')->whereDate('date', '>=', Carbon::today('Europe/Zagreb')->toDateString())->whereDate('date','<', Carbon::today('Europe/Zagreb')->addDay(7)->toDateString())->get();
            $schedulesDates             = Schedules::select('date')->where('schedules.visibility', '=', '1')->whereDate('date', '>=', Carbon::today('Europe/Zagreb')->toDateString())->whereDate('date','<', Carbon::today('Europe/Zagreb')->addDay(7)->toDateString())->get();
            $schedulesDates             = $schedulesDates->unique('date');

            if(!empty($currentPage)){
                if($currentInfo->multiplicity == 0 && $currentInfo->category == 'livestream'){
                    $shows          = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'shows')->where('multiplicity', '=', '0')->where('pages.visibility', '=', '1')->where('id', '!=', $currentInfo->id)->orderByRaw('RAND()')->limit(3)->get();
                    return view('app.pages.livestream', compact('mainNavigation', 'currentPage', 'currentInfo', 'shows', 'partners', 'marketings', 'schedules', 'schedulesDates', 'termsOfUse'));
                }
                if($currentInfo->multiplicity == 0 && $currentInfo->category == 'news'){
                    $news           = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'news')->where('multiplicity', '=', '0')->where('pages.visibility', '=', '1')->where('id', '!=', $currentInfo->id)->orderByRaw('RAND()')->limit(3)->get();
                    return view('app.pages.article', compact('mainNavigation', 'currentPage', 'currentInfo', 'news', 'partners', 'marketings', 'schedules', 'schedulesDates', 'termsOfUse'));
                }
                if($currentInfo->multiplicity == 0 && $currentInfo->category == 'stories'){
                    $stories        = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'stories')->where('multiplicity', '=', '0')->where('pages.visibility', '=', '1')->where('id', '!=', $currentInfo->id)->orderByRaw('RAND()')->limit(3)->get();
                    return view('app.pages.story', compact('mainNavigation', 'currentPage', 'currentInfo', 'stories', 'partners', 'marketings', 'schedules', 'schedulesDates', 'termsOfUse'));
                }
                if($currentInfo->multiplicity == 0 && $currentInfo->category == 'highlights'){
                    $highlights      = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'highlights')->where('multiplicity', '=', '0')->where('emitted_at', '<=', Carbon::now('Europe/Zagreb'))->where('pages.visibility', '=', '1')->where('id', '!=', $currentInfo->id)->orderByRaw('RAND()')->limit(3)->get();
                    return view('app.pages.highlight', compact('mainNavigation', 'currentPage', 'currentInfo', 'highlights', 'partners', 'marketings', 'schedules', 'schedulesDates', 'termsOfUse'));
                }
                if($currentInfo->multiplicity == 0 && $currentInfo->category == 'shows'){
                    $shows          = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'shows')->where('multiplicity', '=', '0')->where('pages.visibility', '=', '1')->where('id', '!=', $currentInfo->id)->orderByRaw('RAND()')->limit(3)->get();
                    return view('app.pages.show', compact('mainNavigation', 'currentPage', 'currentInfo', 'shows', 'partners', 'marketings', 'schedules', 'schedulesDates', 'termsOfUse'));
                }
                if($currentInfo->category == 'programs'){
                    $programs               = Pages::with('carousels_app.carousels_fragments_app.photos', 'galleries_app.galleries_fragments_app.photos', 'videos_app', 'files_app', 'locations_app', 'schedules_app')->where('category', '=', 'programs')->where('multiplicity', '=', '0')->where('pages.visibility', '=', '1')->orderByRaw('RAND()')->limit(3)->get();
                    return view('app.pages.programs', compact('mainNavigation', 'currentPage', 'currentInfo', 'programs', 'partners', 'marketings', 'schedules', 'schedulesDates', 'termsOfUse'));
                }
                return view('app.pages.'.$category, compact('mainNavigation', 'currentPage', 'currentInfo', 'news', 'stories', 'highlights', 'programs', 'shows', 'partners', 'marketings', 'schedules', 'schedulesDates', 'termsOfUse'));
            }else{
                return view('errors.404');
            }
        }else{
            return view('errors.404');
        }
    }

    public function sendInquiry(Request $request)
    {
        try{
            $rules = ['captcha' => 'required|hiddencaptcha'];
            $validator = Validator::make($request->all(), $rules);

            if($validator->fails()){
                return redirect()->back()->with('message_type', 'Error')->with('message_title', 'Inquiry.')->with('message_content', 'An error occurred. Please try again.');
            }else {
                Mail::send('emails.inquiry', ['name' => $request->name, 'email' => $request->email, 'messageText' => $request->message], function ($message) use ($request) {
                    $message->from($request->email, $request->name);
                    $message->sender($request->email, $request->name);
                    $message->replyTo($request->email, $request->name);
                    $message->to('', '');
                    $message->subject(''.$request->name);
                });
                return redirect()->back()->with('message_type', 'Success')->with('message_title', 'Inquiry.')->with('message_content', 'Your inquiry has been sent.');
            }
        }catch (Exception $exception){
            return redirect()->back()->with('message_type', 'Error')->with('message_title', 'Inquiry.')->with('message_content', 'An error occurred. Please try again.');
        }
    }
}
