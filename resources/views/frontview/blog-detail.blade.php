@extends('frontview.layouts.app') 
@extends('frontview.layouts.header')
<style type="text/css">
	div#content {
    margin: 5% 0 !important;
}
</style>
 @section('content')
<script>
              $(document).ready(function(){
                var headerfixed = 1;
                if (headerfixed == 1) {
                  $(window).scroll(function () {
                    if ($(window).width() > 991) {
                      if ($(this).scrollTop() > 160) {
                        $('header').addClass('header-fixed');
                          } else {
                        $('header').removeClass('header-fixed');
                      }
                    }
                    else{
                      $('header').removeClass('header-fixed');
                    }
                  });
                }
                else{
                  $('header').removeClass('header-fixed');
                }
              });
        </script>
<div id="content-blogs" class="container">
    <div class="row">
        <div  class="col-sm-1"></div>
        <div id="content" class="col-sm-10">
            <div class="">
                <div class="article-container">
                    <div class="">
                        <div class="">
                            <div class="image">
                                <ul class="thumbnails">
                                    <li>
                                        <div class="thumbnail">
                                            <!-- <img src="{{url('/public/image/artist/20220131135628.jpeg') }}" title="The standard Lorem Ipsum" alt="The standard Lorem Ipsum" /> -->
                                            <img src="{{asset('public/image/blog/'.$blog->featureimage)}}" title="The standard Lorem Ipsum" alt="The standard Lorem Ipsum" />
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="">    
                            <div class="caption-blog singblog-description">
                                <span class="block-date">
                                    <!-- <span class="day">April 01, 2021</span> -->
                                    <span class="day">@php echo date_format($blog->created_at,"M d Y");
                                                                    @endphp</span>
                                </span>
                                <div class="blog-text">
                                    <!-- <span>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                                        release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                                    </span> -->
                                    <span style="color:white;">{{$blog->content}}</span>
                                </div>
                            </div>
                        </div>    
                    </div>    
                    <div class="mt-30">
                        <h3 class="leave-hedding">Comments</h3>
                        <div class="comment_cust">
                            <div class="commentlist">
                                <ul>
                                    @if($leavecomment != "[]")
                                        @foreach($leavecomment as $comment)
                                        <li class="comment-item clearfix">
                                            <div class="comment-text">
                                                <div class="user_img"><i class="fa fa-user"></i></div>
                                                <div class="comment-desc">
                                                    <div class="name"> {{$comment->name}}</div>
                                                    <!-- <div class="date">2021-04-02 12:08:20</div> -->
                                                    <div class="date">@php echo date_format($comment->created_at,"Y-m-d h:i:s");
                                                                        @endphp</div>
                                                    <div class="comment-dis">
                                                    <!--  It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset -->                                                        
                                                        {{$comment->comment}}
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        
                                        @endforeach
                                    @else
                                        <li class="comment-item clearfix text-center" style="color:black;">
                                            No Comment
                                        </li>
                                    @endif
                                    <!-- <li class="comment-item clearfix">
                                        <div class="comment-text">
                                            <div class="user_img"><i class="fa fa-user"></i></div>
                                            <div class="comment-desc">
                                                <div class="name">test</div>
                                                <div class="date">2021-04-02 12:08:38</div>
                                                <div class="comment-dis">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</div>
                                            </div>
                                        </div>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mt-30">
                        <h3 class="leave-hedding">Leave Comment</h3>
                        <div id="post_comment" class="post-comment">
                            <!-- <form id="commnt_form" class="form-horizontal" action="{{url('blog-comment',$blog->id)}}" method="POST" onsubmit="saveComment();return false"> -->
                            <form id="commnt_form" class="form-horizontal" action="{{url('leavecomment')}}" method="POST" >
                                @csrf
                               
                               <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                <div class="form-group required">
                                    <label class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="author" placeholder="Name" class="form-control" required="" />
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" placeholder="Email" class="form-control" required="" />
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-3 control-label">Comment</label>
                                    <div class="col-sm-9">
                                        <textarea name="comment_text" placeholder="Comment" class="form-control" rows="6" maxlength="250" minlength="25" required=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3 control-label"></div>
                                    <div class="col-sm-9 text-left">
                                        <button type="submit" class="btn btn-group-sm btn-default" name="button">Leave Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>

@extends('frontview.layouts.footer') @endsection
