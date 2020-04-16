@extends('layouts.home')
@section('title', 'Dashboard')
@section('bodyClass', 'inner dashboard')
@section('search')
    @include('parts.search')
@endsection
@section('content')
@include('supplier.services.add')
<div class="page-header">
	<div class="container-fluid">
		<div class="row">
			<div class="col-6">
				<h1 class="text-uppercase text-primary m-0 text-left">gighunter dashboard</h1>
			</div>
			<div class="col-6">
				<nav aria-label="breadcrumb" role="navigation">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('home')}}">@lang('home.title')</a></li>
						<li class="breadcrumb-item active" aria-current="page">@lang('home.menu_my_dashboard')</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
<section class="container">
    <div class="row">
        <div class="col-md-4">
            @include('supplier.parts.sidecard')
        </div>
        <div class="col-md-8">
            @include('supplier.parts.nav')
            <div class="tab-content mt-4" id="dashboardTabsContent">
                <div class="tab-pane fade show active" id="myServices" role="tabpanel">
					<p class="lato-bold text-capitalize m-0 h4">@lang('general.dashboard_nav_my_services')</p>
                    <div class="d-flex justify-content-end pb-4">
                        <a href=".add-service" data-toggle="modal" class="btn btn-primary" onclick="$('#add-service')[0].reset()">@lang('service_category.dashboard_supplier_add_service')</a>
                    </div>
                    @if(count($my_services))
                    <div id="servicesList" data-children=".item">
                        @foreach($my_services as $my_service)
                        <div class="item service{{$my_service->id}}">
                            <div class="item-trigger collapsed" data-toggle="collapse" data-parent="#servicesList" data-target="#service{{$my_service->id}}" aria-expanded="false">
                                <div class="item-info-collapsed row">
                                    <!-- <span>{{$my_service->name}}</span> -->
                                    <!-- <p>{{$my_service->parent_cat['name']}}{{" - ".$my_service->sub_cat['name']}}</p> -->
                                    <!-- <span>{{$my_service->price_per_unit}} EGP <p>per {{$my_service->price_unit}}</p></span> -->
                                    <!-- <i class="icon-angle-down"></i> -->
                                    <div class="col-2 col-md-3 col-lg-3 pr-0">
                                        <p class="font-weight-bold">{{$my_service->name}}</p>
                                    </div>
                                    <div class="col-3 col-md-3 col-lg-4">
                                        <p class="font-weight-bold">{{(app()->getLocale()=="ar"&&$my_service->parent_cat['name_ar'])?$my_service->parent_cat['name_ar']:$my_service->parent_cat['name']}} - {{(app()->getLocale()=="ar"&&$my_service->sub_cat['name_ar'])?$my_service->sub_cat['name_ar']:$my_service->sub_cat['name']}}</p>
                                    </div>
                                    <div class="col-3 col-md-4 col-lg-4">
                                        <p class="text-primary font-weight-bold">{{number_format($my_service->price_per_unit)}} @lang('general.service_price_unit_EGP') <span class="font-weight-light text-dark">@lang('general.service_price_unit_per')  {{trans('general.service_'.$my_service->price_unit)}}</span></p>
                                    </div>
                                    <i class="icon-angle-down col-2 col-md-2 col-lg-1 text-center"></i>
                                </div>
                                <div class="item-info">
                                    <div class="mr-auto">
                                        <h2>{{$my_service->name}}</h2>
                                        <p>{{(app()->getLocale()=="ar"&&$my_service->parent_cat['name_ar'])?$my_service->parent_cat['name_ar']:$my_service->parent_cat['name']}} - {{(app()->getLocale()=="ar"&&$my_service->sub_cat['name_ar'])?$my_service->sub_cat['name_ar']:$my_service->sub_cat['name']}}</p>
                                    </div>
                                    <i class="icon-angle-down"></i>
                                </div>
                            </div>
                            <div id="service{{$my_service->id}}" class="item-content edit-service collapse" role="tabpanel">
                                <form method="post" action="{{route('update_service',['id'=>$my_service->id])}}" enctype="multipart/form-data" id="edit{{$my_service->id}}-service">
                                    <div class="container">
                                        <div class="row">
                                            {{csrf_field()}}
                                            <div class="col-md-6 pt-3">
                                                <label class="form-group has-float-label d-flex justify-content-between align-items-center edit{{$my_service->id}}name">
                                                    <input type="text" required class="form-control pl-0" placeholder="@lang('service_category.dashboard_supplier_service_name')" name="name" value="{{$my_service->name}}">
                                                    <span>@lang('service_category.dashboard_supplier_service_name')</span>
                                                    <p class="help-block d-none"></p>
                                                </label>


                                                <label class="form-group has-float-label mt-5" id="parent{{$my_service->id}}">
                                                    <select class="form-control pl-0" id="parentselector{{$my_service->id}}" name="parent" required>
                                                        <option disabled>@lang('service_category.dashboard_supplier_select_category')</option>
                                                        @foreach($parents_categories as $cat):
                                                        <option value="{{$cat->slug}}" <?=($my_service->parent_cat['slug']==$cat->slug)?"selected":"";?>>{{(app()->getLocale()=="ar"&&$cat->name_ar)?$cat->name_ar:$cat->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span>@lang('service_category.dashboard_supplier_select_category')</span>
                                                    <script type="text/javascript">
                                                        $('#parentselector{{$my_service->id}}').on('change',function (e) {
                                                            $.post('{{url(app()->getLocale()."/category/dependancy")}}',
                                                                    { _token:$('meta[name="csrf-token"]').attr('content'),
                                                                    slug: $('#parentselector{{$my_service->id}}').val(),
                                                                    stage: 1,
                                                                    subidselector:"subselector{{$my_service->id}}",
                                                                    subsubid:"subsub{{$my_service->id}}",
                                                                    })
                                                            .done(function(content){
                                                                $( "#sub{{$my_service->id}}" ).empty().append( content );
                                                                $( "#subsub{{$my_service->id}}" ).empty();
                                                            });
                                                        });
                                                    </script>
                                                </label>
                                                <label class="has-float-label form-group " id="sub{{$my_service->id}}">
                                                    <select class="form-control pl-0" name="sub" id="subselector{{$my_service->id}}" required>
                                                        <option disabled selected>@lang('service_category.dashboard_supplier_select_category')</option>
                                                        <?php $sub_categories = DB::table('categories')->where('parent_id',$my_service->parent_cat['id'])->get(); ?>
                                                        @foreach($sub_categories as $subcat):
                                                        <option value="{{$subcat->slug}}" <?=($my_service->sub_cat['slug']==$subcat->slug)?"selected":"";?>>{{(app()->getLocale()=="ar"&&$subcat->name_ar)?$subcat->name_ar:$subcat->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <script type="text/javascript">
                                                        $('#subselector{{$my_service->id}}').on('change',function (e) {
                                                            $.post('{{url(app()->getLocale()."/category/dependancy")}}',
                                                                    { _token:$('meta[name="csrf-token"]').attr('content'),
                                                                    slug: $('#subselector{{$my_service->id}}').val(),
                                                                    stage: 2,
                                                                    })
                                                            .done(function(content){
                                                                $( "#subsub{{$my_service->id}}" ).empty().append( content );
                                                            });
                                                        });
                                                    </script>
                                                    <p class="help-block edit{{$my_service->id}}category"></p>
                                                </label>

                                                <label class="has-float-label form-group" id="subsub{{$my_service->id}}">
                                                    <?php $subsub_categories = DB::table('categories')->where('parent_id',$my_service->sub_cat['id'])->get(); ?>
                                                    @if(count($subsub_categories)>0)
                                                        <select class="form-control pl-0" name="subsub" required>
                                                            <option disabled selected>@lang('service_category.dashboard_supplier_select_category')</option>
                                                            @foreach($subsub_categories as $subsubcat):
                                                            <option value="{{$subsubcat->slug}}" <?=($my_service->subsub_cat['slug']==$subsubcat->slug)?"selected":"";?>>{{(app()->getLocale()=="ar"&&$subsubcat->name_ar)?$subsubcat->name_ar:$subsubcat->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    @endif
                                                </label>
                                        
                                                <label class="form-group has-float-label d-flex justify-content-between align-items-center edit{{$my_service->id}}price mt-5">
                                                    <input type="text" class="form-control pl-0 " name="price_per_unit" placeholder="@lang('service_category.dashboard_supplier_price')" value="{{$my_service->price_per_unit}}">
                                                    <span>@lang('service_category.dashboard_supplier_price')</span>
                                                    <p class="help-block d-none"><strong></strong> </p>                         
                                                </label>
                                                <label class="form-group has-float-label d-flex justify-content-between align-items-center edit{{$my_service->id}}unit mt-5">
                                                    <select class="form-control noMargenBotton pl-0" name="price_unit" required>
                                                        <option value="unit" disabled>@lang('service_category.dashboard_supplier_price_unit')</option>
                                                            <option value="project" {{($my_service->price_unit=="project")?"selected":""}}>@lang('service_category.dashboard_supplier_price_project')</option>
                                                            <option value="hour" {{($my_service->price_unit=="hour"||$my_service->price_unit=="hours")?"selected":""}}>@lang('service_category.dashboard_supplier_price_hours')</option>
                                                    </select>
                                                    <span>@lang('service_category.dashboard_supplier_price_unit')</span>
                                                    <p class="help-block d-none"><strong></strong> </p>  
                                                </label>
                                                <label class="form-group has-float-label d-flex justify-content-between align-items-center edit{{$my_service->id}}days_to_delever mt-5">
                                                    <input type="number" class="form-control pl-0" name="days_to_deliver" placeholder="@lang('service_category.dashboard_supplier_select_type_days')" value="{{$my_service->days_to_deliver}}" required>
                                                    @if($my_service->price_unit == 'project')
                                                        <span>@lang('service_category.dashboard_supplier_select_type_days')</span>
                                                    @else
                                                        <span>@lang('service_category.dashboard_supplier_select_type_hours')</span>
                                                    @endif
                                                    <p class="help-block d-none"> <strong></strong> </p>
                                                </label>
                                                <div class="form-group editImages">
                                                    <b class="text-black h4 mb-2">@lang('service_category.dashboard_supplier_profile_photo')</b>
                                                    <?php if ($my_service->photos): ?>
                                                        <div class="row pl-4 pr-4" id="editingImageRow">
															@foreach ($my_service->photos as $photo)
															<div class="col-sm-4 editimg-{{$photo->id}} pl-0 mb-2 pr-0 editingImageSingle">
																<img src="{{flexihelp::get_file($photo->filename,'service',20)}}" class="img-fluid">
																<button type="button" class="deleteimg" data-id="{{$photo->id}}">X</button>
															</div>
															@endforeach
														</div>
                                                    <?php endif ?>
                                                    
                                                    <label class="custom-file">
                                                        <input type="file" name="img[]"   multiple class="custom-file-input" accept="image/*" id="portfolioImages" {{(count($my_service->photos))?'':'required'}}>
                                                        <span class="custom-file-control"></span>
                                                    </label>
                                                    <p class="mb-4">png - jpg - gif</p>
                                                    <label class="form-group has-float-label item-requirment edit{{$my_service->id}}description">
                                                        <textarea name="description" class="form-control counted mt-0 pl-0" rows="4" maxlength="2500" placeholder="@lang('service_category.dashboard_supplier_description_placeholder')" required>{{$my_service->description}}</textarea>
                                                        <span>@lang('service_category.dashboard_supplier_description')</span>
                                                        <p class="char">0/2500</p>  
                                                        <span class="help-block d-none"> <strong></strong> </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pt-3">
                                                <label class="form-group has-float-label item-requirment edit{{$my_service->id}}terms" style="margin-top: 35px">
                                                    <textarea name="terms" class="form-control counted mt-0 pl-0" maxlength="2500" rows="4" placeholder="@lang('service_category.dashboard_supplier_terms_conditions_placeholder')"><?=$my_service->terms?></textarea>
                                                    <span>@lang('service_category.dashboard_supplier_terms_conditions')</span>       
                                                    <p class="char">0/2500</p>  
                                                    <P class="help-block d-none"> <strong></strong> </P>                                      
                                                </label>
                                                <div class="item-review item-questions mt-5">
                                                    <h4>@lang('service_category.dashboard_supplier_requirements')</h4>
                                                </div>
                                
                                            
                                                <div class="questionsGroup" style="position:relative;">
													<small class="d-none h6 font-weight-bold" id="addQuestMainLink"><a class="first-add text-primary" style="position: absolute; bottom: -25px; right: 0; text-transform: capitalize; cursor: pointer;"  onclick="$('.edit{{$my_service->id}}question1').removeClass('d-none').addClass('d-flex');$(this).parent().addClass('d-none').removeClass('d-flex');" title="">@lang('service_category.dashboard_supplier_add_question')</a></small>                                        
													
                                                    <label class="form-group has-float-label mb-0 mt-5 d-flex justify-content-between edit{{$my_service->id}}question1">
                                                        <input name="question1" class="form-control" placeholder="@lang('service_category.dashboard_supplier_requirements_questions.question_1')" maxlength="200" type="text" value="{{$my_service->question1}}" required>
                                                        <span>@lang('service_category.dashboard_supplier_requirements_questions.question_1')</span>
                                                        <p class="help-block d-none"><strong></strong> </p>                         
                                                        <small class=" <?=(!empty($my_service->question2))?'d-none':'d-flex'?> "><a class="first-add text-primary" style="position: absolute; bottom: -25px; right: 0; text-transform: capitalize; cursor: pointer;"  onclick="$('.question2{{$my_service->id}}').removeClass('d-none').addClass('d-flex');$(this).parent().addClass('d-none').removeClass('d-flex');" title="">@lang('service_category.dashboard_supplier_add_question')</a></small>                                        
                                                    </label>

                                                    <label class="form-group has-float-label mb-0 mt-5 justify-content-between question2{{$my_service->id}} <?=(!empty($my_service->question2))?'d-flex':'d-none'?>">
                                                        <input name="question2" class="form-control" maxlength="200" placeholder="@lang('service_category.dashboard_supplier_requirements_questions.question_2')" type="text" value="{{$my_service->question2}}">
                                                        <span>@lang('service_category.dashboard_supplier_requirements_questions.question_2')</span>
                                                        <p><a class="text-danger" style="cursor:pointer; position: absolute; bottom: -25px; right: 5px;text-decoration: none;" onclick="$(this).parent().siblings('input').attr('value','');$(this).parent().parent().removeClass('d-flex').addClass('d-none');$('.edit{{$my_service->id}}question1').find('small').removeClass('d-none').addClass('d-flex')" title="">X</a></p>
                                                        <small class=" <?=(!empty($my_service->question3))?'d-none':'d-flex'?> "><a class="first-add text-primary" style="position: absolute; bottom: -25px; right: 0; text-transform: capitalize; cursor: pointer;"  onclick="$('.question3{{$my_service->id}}').removeClass('d-none').addClass('d-flex');$(this).parent().addClass('d-none').removeClass('d-flex');" title="">@lang('service_category.dashboard_supplier_add_question')</a></small>
                                                    </label>

                                                    <label class="form-group has-float-label mb-0 mt-5 justify-content-between question3{{$my_service->id}} <?=($my_service->question3)?'d-flex':'d-none'?>">
                                                        <input type="text" class="form-control pl-0" maxlength="200" placeholder="@lang('service_category.dashboard_supplier_requirements_questions.question_3')" name="question3" value="{{$my_service->question3}}">
                                                        <span>@lang('service_category.dashboard_supplier_requirements_questions.question_3')</span>
                                                        <p><a class="text-danger" style="cursor:pointer; position: absolute; bottom: -25px; right: 5px;text-decoration: none;" onclick="$(this).parent().siblings('input').attr('value','');$(this).parent().parent().removeClass('d-flex').addClass('d-none');$('.question2{{$my_service->id}}').find('small').removeClass('d-none').addClass('d-flex')" title="">X</a></p>
                                                    </label> 
                                                </div>
                                                <!-- <script>
                                                    var $addMore = $('.more');
                                                    var $questNumber = $addMore.closest('.item').find('.questionsGroup').find('label');
                                                    $addMore.click(function(){
                                                        console.log($questNumber);
                                                    });
                                                </script> -->
                                                <div id="videos{{$my_service->id}}" style="margin-bottom: 80px">
                                                    <div id="videos-cont">
                                                        <!-- <b class="mt-0 mb-0 text-dark h3"> Video URL</b> -->
                                                        <div class="item-review item-questions mt-5">
                                                            <h4>@lang('service_category.dashboard_supplier_video_URL')</h4>
                                                        </div>
                                                        @foreach ($my_service->videos as $video)
                                                        <label class="form-group has-float-label d-flex justigy-content-between align-items-center vid-{{$video->id}} mt-5">
                                                            <input type="text" class="form-control" name="videourl[]" placeholder="@lang('service_category.dashboard_supplier_video_URL')" value="{{$video->url}}">
                                                            <span>@lang('service_category.dashboard_supplier_video_URL')</span>
                                                            <p><a class="text-danger" style="cursor:pointer;" onclick="$('.vid-{{$video->id}}').remove();" title="">X</a></p>
                                                        </label>
                                                        @endforeach
                                                    </div>
                                                    <span style="position:absolute; right:20px;"><a style="cursor:pointer;font-family:'Lato-Regular';" class="text-primary font-weight-regular" id="add_morevideo{{$my_service->id}}">@lang('service_category.dashboard_supplier_video_URL_add')</a></span>
                                                </div>
                                                <script>
                                                    $(document).ready(function(){
                                                        var id = 1;
														var showId = 0;
                                                        $("#add_morevideo{{$my_service->id}}").click(function(){
                                                            var videos = $('#videos{{$my_service->id}} .form-control');
                                                            var showId = ++id;
                                                            if(videos.length <= 9-<?=count($my_service->videos)?>){
                                                                $('#videos{{$my_service->id}} #videos-cont').append('<label class="form-group has-float-label d-flex justify-content-between align-items-center vid-'+showId+' mt-5"> <input name="videourl[]" class="form-control" placeholder="@lang("service_category.dashboard_supplier_video_URL")" type="text"> <span>@lang("service_category.dashboard_supplier_video_URL") '+(videos.length+1) +'</span> <p class="float-left text-primary h5" style="cursor:pointer;"><a class="text-danger" style="cursor:pointer;" onclick="$(this).closest(\'.has-float-label\').remove();$(\'#add_morevideo{{$my_service->id}}\').removeClass(\'d-none\');showId = --id;" title="">X</a></p></label>');
                                                                if(videos.length == 9-<?=count($my_service->videos)?>){
                                                                    $('#add_morevideo{{$my_service->id}}').addClass('d-none');
                                                                } 
                                                            }
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-4 container">
                                        <div class="row  d-flex flex-row justify-content-end">
                                            <button type="button" class="mt-2 btn btn-outline-danger deleteservice" data-id="{{$my_service->id}}">@lang('general.button_delete')</button>
                                            <button type="button" class="mt-2 btn btn-outline-secondary" data-toggle="collapse" data-parent="#servicesList" data-target="#service{{$my_service->id}}" aria-expanded="false">@lang('general.button_cancel')</button>
                                            <button type="submit" class="mt-2 btn btn-outline-primary sendbtn{{$my_service->id}}">@lang('general.button_save')</button>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        $(document).ready(function() { 
                                            $('#edit{{$my_service->id}}-service').ajaxForm( {
												beforeSend: function(){
                                                    $('.sendbtn{{$my_service->id}}').prop('disabled',true);
                                                    $('.sendbtn{{$my_service->id}} i').removeClass('d-none');
                                                },
												success: function (message) {
													swal("@lang('service_category.dashboard_supplier_service_save_title')", "@lang('service_category.dashboard_supplier_service_save_msg')", "success").then(function (value){
														window.location = "{{route('supplier_services')}}";
													});
												},
												error: function (message) {
													$('.sendbtn{{$my_service->id}}').prop("disabled", false);
                                                    $('.sendbtn{{$my_service->id}}>i').addClass('d-none');
													edit{{$my_service->id}}serviceErrors = message.responseJSON;
													if (edit{{$my_service->id}}serviceErrors.name) {
														$('.edit{{$my_service->id}}name').addClass('has-error');
														$('.edit{{$my_service->id}}name .help-block').removeClass('d-none').text(edit{{$my_service->id}}serviceErrors.name);
													}
													if (edit{{$my_service->id}}serviceErrors.days_to_delever) {
														$('.edit{{$my_service->id}}days_to_delever').addClass('has-error');
														$('.edit{{$my_service->id}}days_to_delever .help-block').removeClass('d-none').text(edit{{$my_service->id}}serviceErrors.days_to_delever);
													}
													if (edit{{$my_service->id}}serviceErrors.price_per_unit) {
														$('.edit{{$my_service->id}}price').addClass('has-error');
														$('.edit{{$my_service->id}}price .help-block').removeClass('d-none').text(edit{{$my_service->id}}serviceErrors.price_per_unit);
													}
													if (edit{{$my_service->id}}serviceErrors.price_unit) {
														$('.edit{{$my_service->id}}unit').addClass('has-error');
														$('.edit{{$my_service->id}}unit .help-block').removeClass('d-none').text(edit{{$my_service->id}}serviceErrors.price_unit);
													}
													if (edit{{$my_service->id}}serviceErrors.category) {
														$('.edit{{$my_service->id}}category.help-block').removeClass('d-none').text(edit{{$my_service->id}}serviceErrors.category);
													}
													if (edit{{$my_service->id}}serviceErrors.description) {
														$('.edit{{$my_service->id}}description').addClass('has-error');
														$('.edit{{$my_service->id}}description .help-block').removeClass('d-none').text(edit{{$my_service->id}}serviceErrors.description);
													}
													if (edit{{$my_service->id}}serviceErrors.terms) {
														$('.edit{{$my_service->id}}terms').addClass('has-error');
														$('.edit{{$my_service->id}}terms .help-block').removeClass('d-none').text(edit{{$my_service->id}}serviceErrors.terms);
													}
													if (edit{{$my_service->id}}serviceErrors.question1) {
														$('.edit{{$my_service->id}}question1').addClass('has-error');
														$('.edit{{$my_service->id}}question1 .help-block').removeClass('d-none').text(edit{{$my_service->id}}serviceErrors.question1);
													}
											     }
                                            });
                                        });
                                    </script>
                                </form>
                            </div>
                        </div>
                        @endforeach
                        @include('supplier.services.deleteimage')
                        @include('supplier.services.deleteservice')
                    </div>
                    <div class="row mt-5">
                    {{$my_services->links()}}
                    </div>
                    @else
                    <div class="item text-center noResult">
                        <p class="noresultfound m-0 text-capitalize h4 text-secondary">{{trans_choice('general.noresult',Request::segment(4), ['tab-name' => Request::segment(4) ])}}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection