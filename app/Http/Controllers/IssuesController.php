<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use Auth;
use App\Http\Requests\StoreIssue,App\Http\Requests\UpdateIssue;
use GrahamCampbell\Markdown\Facades\Markdown;

class IssuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issue=Issue::with('user','comments')->orderBy('created_at','desc')->paginate(5);
        return view('issues.index')->with('issues',$issue);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::check())
        {
            return redirect('/')->with('alert','请先登陆');
        }
        return view('issues.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIssue $request)
    {
        $request->validate([
            'title'=>'required|unique:issues|max:255',
            'content'=>'required',
        ]);
        Issue::create($request->all());
        return redirect('/')->with('notice','Issue 新增成功~');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Issue $issue)
    {
        $comments=$issue->comments;
        $content=Markdown::convertToHtml($issue->content);
        return view('issues.show',compact('issue','comments','content'));//compact等于多个->with->with
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Issue $issue)
    {
        return view('issues.edit')->with('issue',$issue);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIssue $request, Issue $issue)
    {
        $issue->update($request->all());
        return redirect(route('issues.show',$issue->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Issue::destroy($id);
        return redirect('/');
    }
}
