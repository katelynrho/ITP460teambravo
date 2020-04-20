@extends('layouts.loggedin')
@section('title', 'profile - student')

@section('content')

    <div class="container" id="profile-container">
        <nav class="nav profile-nav">
            <a class="nav-link active" href="#" id="nav-about">About You</a>
            <a class="nav-link" href="#" id="nav-sessions">Sessions</a>
            <a class="nav-link" href="#" id="nav-saved">Saved</a>
            <a class="nav-link" href="#" id="nav-reviews">Reviews</a>
        </nav>

        <div class="about__container">
            <div class="about__information">
                <div class="about__information__img">
                    <div class="img-container">
                        <img src="{{$userPhotoUrl}}" alt="profile_img">
                    </div>
                </div>

                <div class="about__information__content">
                    <div class="name"><h4>{{$user->full_name}}</h4></div>
                    <div class="major-minor-container">
                        <span class="descriptor">Major</span>
                        <span class="descriptor">Minor</span>
                        <span class="text">{{$user->major['major']}}</span>
                        <span class="text">{{$user->minor ?? 'None'}}</span>
                    </div>
                    <div class="year-container">
                        <span class="descriptor">Year</span>
                        <span class="text">{{$user->school_year['school_year']}}</span>
                    </div>
                    <a class="btn btn-lg btn-primary" href="/edit_profile">Edit Profile</a>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-5 col-12">
                    <form class="about__subjects" method="POST" action="/addFavSubject">
                        @csrf
                        <div class="about__subjects__header">Subjects</div>
                        <div class="about__content">
                            <svg>
                                <use xlink:href="{{asset('assets/sprite.svg#icon-magnifying-glass')}}"></use>
                            </svg>
                            <input type="text" placeholder="Add Subjects" class="about__input" name="subject" id="subject" value="{{old('subject')}}">
                            <button class="btn btn-primary btn-lg add-btn" type="submit">Add +</button>
                        </div>
                    </form>

                    <div class="about__buttons__container">
                        @foreach ($subjects as $subject)
                            <button class="btn btn-lg" data-subject-id="{{$subject->id}}>
                                <svg>
                                    <use xlink:href="{{asset('assets/sprite.svg#icon-cross')}}"></use>
                                </svg>
                                <span class="name">{{$subject->subject}}</span>
                            </button>
                        @endforeach


                    </div>

                    <form class="about__courses" method="POST" action="/add_fav_course">
                        @csrf
                        <div class="about__courses__header">
                            Courses
                        </div>
                        <div class="about__content">
                            <svg>
                                <use xlink:href="assets/sprite.svg#icon-magnifying-glass"></use>
                            </svg>
                            <input type="text" placeholder="Add Courses" class="about__input" name="course" id="course">
                            <button class="btn btn-primary btn-lg add-btn" type="submit">Add +</button>
                        </div>
                    </form>

                    <div class="about__buttons__container about__buttons__container--courses" id="about__buttons__container--courses">

                        @foreach ($courses as $course)
                        <button class="btn btn-lg" data-course-id="{{$course->id}}">
                            <svg>
                                <use xlink:href="{{asset('assets/sprite.svg#icon-cross')}}"></use>
                            </svg>
                            <span class="name">{{$course->course}}</span>
                        </button>
                        @endforeach

                    </div>


                    <form class="about__characteristics" method="POST" action="/add_characteristic">
                        @csrf
                        <div class="about__characteristics__header">
                            Characteristics
                        </div>
                        <div class="about__content">
                            <svg>
                                <use xlink:href="{{asset('assets/sprite.svg#icon-magnifying-glass')}}"></use>
                            </svg>
                            <input type="text" placeholder="Add Characteristics" class="about__input" name="characteristic" id="characteristic">
                            <button class="btn btn-primary btn-lg add-btn" type="submit">Add +</button>
                        </div>
                    </form>

                    <div class="about__buttons__container" id="about__buttons__container--characteristics">
                        @foreach ($characteristics as $characteristic)
                        <button class="btn btn-lg" data-characteristic-id="{{$characteristic->id}}">
                            <svg>
                                <use xlink:href="{{asset('assets/sprite.svg#icon-cross')}}"></use>
                            </svg>
                            <span class="name">{{$characteristic->characteristic}}</span>
                        </button>
                        @endforeach
                    </div>

                </div>
                <div class="col-sm-7 col-12 reviews">

                </div>

            </div>
        </div>

        <div class="sessions__container">
            <div class="sessions__container-1">
                <div class="sessions__header">
                    <h4>Upcoming Tutoring Sessions</h4>
                </div>
                {{-- <div class="sessions__header--sub">
                    Some description here
                </div> --}}
                <div class="sessions__info p-relative">

                    <div class="sessions__info">
                        <div class="shadow-container">

                        </div>
                        {{-- @foreach ($upcomingSessions as $upcomingSession)
                        <div class="session__container">
                            <span class="title">Jamie Chang</span>
                            <span class="descriptor">Date</span>
                            <span class="descriptor">Subject / Course</span>
                            <span class="text">02/20/2020</span>
                            <span class="text">ITP 104</span>
                            <span class="descriptor">Time</span>
                            <span class="descriptor">Hourly Rate</span>
                            <span class="text">5 - 6pm</span>
                            <span class="text">$16 / hr</span>
                            <button class="btn btn-lg btn-outline-primary">Cancel Session</button>
                            <button class="btn btn-lg btn-primary">View Session</button>
                        </div>
                        <div class="session__container">
                            <span class="title">Jamie Chang</span>
                            <span class="descriptor">Date</span>
                            <span class="descriptor">Subject / Course</span>
                            <span class="text">02/20/2020</span>
                            <span class="text">ITP 104</span>
                            <span class="descriptor">Time</span>
                            <span class="descriptor">Hourly Rate</span>
                            <span class="text">5 - 6pm</span>
                            <span class="text">$16 / hr</span>
                            <button class="btn btn-lg btn-outline-primary">Cancel Session</button>
                            <button class="btn btn-lg btn-primary">View Session</button>
                        </div>
                        <div class="session__container">
                            <span class="title">Jamie Chang</span>
                            <span class="descriptor">Date</span>
                            <span class="descriptor">Subject / Course</span>
                            <span class="text">02/20/2020</span>
                            <span class="text">ITP 104</span>
                            <span class="descriptor">Time</span>
                            <span class="descriptor">Hourly Rate</span>
                            <span class="text">5 - 6pm</span>
                            <span class="text">$16 / hr</span>
                            <button class="btn btn-lg btn-outline-primary">Cancel Session</button>
                            <button class="btn btn-lg btn-primary">View Session</button>
                        </div>
                          @endforeach --}}
                    </div>
                </div>
            </div>

            <div class="sessions__container-2">
                <div class="sessions__header">
                    <h4>Past Tutoring Sessions</h4>
                </div>
                {{-- <div class="sessions__header--sub">
                    Some description here
                </div> --}}
                <div class="sessions__info">
                    {{-- @foreach ($pastSessions as $pastSession)
                    <div class="session__container">
                        <span class="title">{{$pastSession->full_name}}</span>
                        <span class="descriptor">Date</span>
                        <span class="descriptor">Course</span>
                        <span class="text">{{date('m/d/Y', strtotime($pastSession->date))}}</span>
                        @if($pastSession->is_course)
                        <span class="text">{{App\Course::find($pastSession->course_id)->course}}</span>
                        @else
                        <span class="text">{{App\Subject::find($pastSession->subject_id)->subject}}</span>
                        @endif
                        <span class="descriptor">Time</span>
                        <span class="descriptor">Hourly Rate</span>
                        <span class="text">{{$pastSession->start_time}} - {{$pastSession->end_time}}</span>
                        <span class="text">${{$pastSession->hourly_rate}} / hr</span>
                        <button class="btn btn-lg btn-outline-primary btn-write-review">Write a review +</button>
                        <button class="btn btn-lg btn-primary">View Session</button>
                    </div>
                    @endforeach --}}
                </div>
            </div>

        </div>


        <div class="saved__container">
            <h4>Tutors You Saved</h4>
            <div class="scroll-container">
            <div class="search-card-container row">
                {{-- @foreach ($bookmarks as $bookmark)
                <div class="search-card-flex-container col-lg-3 col-md-4 col-sm-4 col-6">
                    <div class="search-card">
                        <svg class="bookmark bookmark-marked">
                            <use xlink:href="assets/sprite.svg#icon-bookmark"></use>
                        </svg>
                        <img src="{{asset('assets/mj.jpg')}}" alt="user photo">
                        <p class="name">{{$bookmark->full_name}}</p>
                        <p class="major">{{App\Major::find($bookmark->major_id)->major}}</p>
                        <p class="star-container">${{$bookmark->hourly_rate}} / hr | 4.5
                            <svg class="star">
                                <use xlink:href="{{asset('assets/sprite.svg#icon-star')}}"></use>
                            </svg>
                        </p>
                        <p class="courses">Courses:
                        @foreach (App\User::find($bookmark->id)->courses as $course)
                        {{$course->course}}</p>
                        @endforeach
                        <p class="subjects">Subjects:
                        @foreach (App\User::find($bookmark->id)->subjects as $subject)
                        {{$subject->subject}}</p>
                        @endforeach
                    </div>
                </div>
                @endforeach --}}
            </div>
        </div>

        </div>


        <div class="reviews__container">
            <div class="reviews__container__sub">
                <div class="reviews__header">
                    <h4>Reviews You Wrote</h4>
                </div>

                <div class="review-star__container__header">
                    <div>
                        <p>12</p>
                        <svg>
                            <use xlink:href="{{asset('assets/sprite.svg#icon-star')}}"></use>
                        </svg>
                        <svg>
                            <use xlink:href="{{asset('assets/sprite.svg#icon-star')}}"></use>
                        </svg>
                        <svg>
                            <use xlink:href="{{asset('assets/sprite.svg#icon-star')}}"></use>
                        </svg>
                        <svg>
                            <use xlink:href="{{asset('assets/sprite.svg#icon-star')}}"></use>
                        </svg>
                        <svg>
                            <use xlink:href="{{asset('assets/sprite.svg#icon-star-outlined')}}"></use>
                        </svg>
                    </div>
                </div>
            </div>

            <p class="text-right grey-text">102 Reviews</p>

            <div class="reviews">
                <table class="table table-hover reviews-table">
                    <tbody>
                        <tr>
                            <th scope="row"><img src="{{asset('assets/mj.jpg')}}" alt="user photo"></th>
                            <td class="name">Sophia Park </td>
                            <td class="subject-container">
                                <div class="grey-text">Session Subject(s)</div>
                                <div>ITP 104</div>
                            </td>
                            <td class="review-content__container">
                                <p class="review-content">
                                The consultant was incredibly helpful and I left feeling very optimistic about my paper. When I was stuck at a couple transitions she was able to suggest a tweak in order to fit what I was feeling but not able to say. Really just great.<span class="grey-text time-sent">14
                                        days ago</span></p>

                            </td>
                            <td>
                                <div class="review-star__container">
                                    <svg>
                                        <use xlink:href="{{asset('assets/sprite.svg#icon-star')}}"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="{{asset('assets/sprite.svg#icon-star')}}"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="{{asset('assets/sprite.svg#icon-star')}}"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="{{asset('assets/sprite.svg#icon-star')}}"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="{{asset('assets/sprite.svg#icon-star-outlined')}}"></use>
                                    </svg>
                                </div>

                            </td>

                        </tr>
                    </tbody>
                </table>
                <table class="table table-hover reviews-table">
                    <tbody>
                        <tr>
                            <th scope="row"><img src="{{asset('assets/mj.jpg')}}" alt="user photo"></th>
                            <td class="name">Sophia Park </td>
                            <td class="subject-container">
                                <div class="grey-text">Session Subject(s)</div>
                                <div>ITP 104</div>
                            </td>
                            <td class="review-content__container">
                                <p class="review-content">I didn't know what to expect going in, but it turned out to be very effective and informative. Speaking to someone who has so much writing expertise is an amazing experience. Very helpful. The environment is very homey and welcoming. The open windows and friendliness of the staff allow good ideas to come to mind. I really appreciate everything. Thank you! Thank you! Thank you!  Thank you! Thank you! Thank you!  Thank you! Thank you! Thank you!  Thank you! Thank you! Thank you!  Thank you! Thank you! Thank you! <span class="grey-text time-sent">14
                                        days ago</span></p>

                            </td>
                            <td>
                                <div class="review-star__container">
                                    <svg>
                                        <use xlink:href="{{asset('assets/sprite.svg#icon-star')}}"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="{{asset('assets/sprite.svg#icon-star')}}"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="{{asset('assets/sprite.svg#icon-star')}}"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="{{asset('assets/sprite.svg#icon-star')}}"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="{{asset('assets/sprite.svg#icon-star-outlined')}}"></use>
                                    </svg>
                                </div>

                            </td>

                        </tr>
                    </tbody>
                </table>
                <table class="table table-hover reviews-table">
                    <tbody>
                        <tr>
                            <th scope="row"><img src="{{asset('assets/mj.jpg')}}" alt="user photo"></th>
                            <td class="name">Sophia Park </td>
                            <td class="subject-container">
                                <div class="grey-text">Session Subject(s)</div>
                                <div>ITP 104</div>
                            </td>
                            <td class="review-content__container">
                                <p class="review-content">I didn't know what to expect going in, but it turned out to be very effective and informative. Speaking to someone who has so much writing expertise is an amazing experience. Very helpful. The environment is very homey and welcoming. The open windows and friendliness of the staff allow good ideas to come to mind. I really appreciate everything. Thank you! Thank you! Thank you!  Thank you! Thank you! Thank you!  Thank you! Thank you! Thank you!  Thank you! Thank you! Thank you!  Thank you! Thank you! Thank you! <span class="grey-text time-sent">14
                                        days ago</span></p>

                            </td>
                            <td>
                                <div class="review-star__container">
                                    <svg>
                                        <use xlink:href="{{asset('assets/sprite.svg#icon-star')}}"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="{{asset('assets/sprite.svg#icon-star')}}"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="{{asset('assets/sprite.svg#icon-star')}}"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="{{asset('assets/sprite.svg#icon-star')}}"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="{{asset('assets/sprite.svg#icon-star-outlined')}}"></use>
                                    </svg>
                                </div>

                            </td>

                        </tr>
                    </tbody>
                </table>
                <table class="table table-hover reviews-table">
                    <tbody>
                        <tr>
                            <th scope="row"><img src="{{asset('assets/mj.jpg')}}" alt="user photo"></th>
                            <td class="name">Sophia Park </td>
                            <td class="subject-container">
                                <div class="grey-text">Session Subject(s)</div>
                                <div>ITP 104</div>
                            </td>
                            <td class="review-content__container">
                                <p class="review-content">I didn't know what to expect going in, but it turned out to be very effective and informative. Speaking to someone who has so much writing expertise is an amazing experience. Very helpful. The environment is very homey and welcoming. The open windows and friendliness of the staff allow good ideas to come to mind. I really appreciate everything. Thank you! Thank you! Thank you!  Thank you! Thank you! Thank you!  Thank you! Thank you! Thank you!  Thank you! Thank you! Thank you!  Thank you! Thank you! Thank you! <span class="grey-text time-sent">14
                                        days ago</span></p>

                            </td>
                            <td>
                                <div class="review-star__container">
                                    <svg>
                                        <use xlink:href="{{asset('assets/sprite.svg#icon-star')}}"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="{{asset('assets/sprite.svg#icon-star')}}"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="{{asset('assets/sprite.svg#icon-star')}}"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="{{asset('assets/sprite.svg#icon-star')}}"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="{{asset('assets/sprite.svg#icon-star-outlined')}}"></use>
                                    </svg>
                                </div>

                            </td>

                        </tr>
                    </tbody>
                </table>
                <table class="table table-hover reviews-table">
                    <tbody>
                        <tr>
                            <th scope="row"><img src="{{asset('assets/mj.jpg')}}" alt="user photo"></th>
                            <td class="name">Sophia Park </td>
                            <td class="subject-container">
                                <div class="grey-text">Session Subject(s)</div>
                                <div>ITP 104</div>
                            </td>
                            <td class="review-content__container">
                                <p class="review-content">I didn't know what to expect going in, but it turned out to be very effective and informative. Speaking to someone who has so much writing expertise is an amazing experience. Very helpful. The environment is very homey and welcoming. The open windows and friendliness of the staff allow good ideas to come to mind. I really appreciate everything. Thank you! Thank you! Thank you!  Thank you! Thank you! Thank you!  Thank you! Thank you! Thank you!  Thank you! Thank you! Thank you!  Thank you! Thank you! Thank you! <span class="grey-text time-sent">14
                                        days ago</span></p>

                            </td>
                            <td>
                                <div class="review-star__container">
                                    <svg>
                                        <use xlink:href="{{asset('assets/sprite.svg#icon-star')}}"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="{{asset('assets/sprite.svg#icon-star')}}"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="{{asset('assets/sprite.svg#icon-star')}}"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="{{asset('assets/sprite.svg#icon-star')}}"></use>
                                    </svg>
                                    <svg>
                                        <use xlink:href="{{asset('assets/sprite.svg#icon-star-outlined')}}"></use>
                                    </svg>
                                </div>

                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection

@section('js')

<!-- for autocomplete -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="{{asset('js/profile.js')}}"></script>

@if(session('errors'))
<script>
    toastr.error("{{session('errors')->first()}}");
</script>
@elseif(session('success'))
<script>
    toastr.success("{{session('success')}}");
</script>
@elseif(session('error'))
<script>
    toastr.error("{{session('error')}}");
</script>
@endif

@endsection



