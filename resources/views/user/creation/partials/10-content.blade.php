{{-- My CSS File --}}
@push('head-css')
<link name="style-09" rel="stylesheet" href="{{ asset('css/style-10.css') }}">

@endpush
<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;

$controller = new Controller();
$userId = $controller->getUUID();
$userController = new UserController();
$user = $userController->getUser($userId);
$name = $user->name;
?>
<div class="type-10">
    <div class="container">
        <div class="comments">
            <div class="block-head">
                <h4 class="heading">Bình luận</h4>
            </div>
            <ol class="comment-list">
               
                <div class="card mb-3 comment-user" style="max-width: 767px; height:125px;">
                    <div class="row g-0">
                        <div class="col-md-1">
                            <img src="{{asset('images/images.png')}}" class="img-fluid img-user" alt="...">
                        </div>
                        <div class="col-md-11">
                            <div class="comment-meta">                    
                                <span class="card-title user-fullname">@php echo $name @endphp</span>
                                <p class="card-text my-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque maxime dolor ad facilis est distinctio odit iure? Aut magnam quisquam temporibus, voluptates illo neque eligendi ratione pariatur quia nihil quibusdam!</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 comment-user" style="max-width: 767px; height:125px;">
                    <div class="row g-0">
                        <div class="col-md-1">
                            <img src="{{asset('images/images.png')}}" class="img-fluid img-user" alt="...">
                        </div>
                        <div class="col-md-11">
                            <div class="comment-meta">
                                <span class="card-title user-fullname">Card title</span>
                                <p class="card-text my-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque maxime dolor ad facilis est distinctio odit iure? Aut magnam quisquam temporibus, voluptates illo neque eligendi ratione pariatur quia nihil quibusdam!</p>

                            </div>
                        </div>
                    </div>
                </div>
             
            </ol>
            <div class="comment-respond">
                <h3 class="comment-reply-title">Gửi bình luận</h3>
                <form action="{{ route('comment.add') }}" method="POST" class="comment-form">
                @csrf
                    <input type="hidden" name="creation_id" id="creation_id" value="{{ $creation->id}}"/>
                    <textarea class="form-text" name="comment_content" id="comment_content" placeholder="Bình luận của bạn" required="required" maxlength="65525"></textarea>
                    <button type="submit" class="submit mt-5" style="font-size: 14px">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>