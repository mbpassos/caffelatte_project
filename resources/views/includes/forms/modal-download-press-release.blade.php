@php session_start(); @endphp
<html>

<head>
  <script type="text/javascript" src="/js/megaTracker.js"></script>
  <script>var tracker=getUrl();</script>
</head>

<body>

<form method="post" class="form-popup form-parsley" action="{{ route('process.download-press-release') }}">

  <div class="row">

    <div class="form-popup-header col-12 mb-3">
        <h1>DOWNLOAD PRESS RELEASE</h1>
    </div>

    {{ csrf_field() }}

    <input type="hidden" name="product_name" value="{{$slug}}"/>
    <input type="hidden" name="origin" class="origin"/>
    <input type="hidden" name="referrer" class="referrer"/>
    <input type="hidden" name="lead_path" class="lead_path"/>
    <input type="text" name="interested" class="interested"/>

    <div class="col-sm-12">
      <div class="input-block {{ $errors->has('name') ? 'has-error' : '' }}">
        <span class="txt-request">Name:*</span>
        <input type="text" name="name" class="form-control name" data-parsley-required="true" data-parsley-trigger="change" value="{{ old('name') }}"/>
      </div>
    </div>

    <div class="col-sm-12">
      <div class="input-block {{ $errors->has('email') ? 'has-error' : '' }}">
        <span class="txt-request">Email:*</span>
        <input type="email" name="email" class="form-control email" data-parsley-required="true" data-parsley-type="email" data-parsley-trigger="change" value="{{ old('email') }}"/>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="input-block {{ $errors->has('occupation') ? 'has-error' : '' }}">
        <span class="txt-request">Occupation:*</span>
        <select name="occupation" class="custom-select occupation" data-parsley-required="true" value="{{ old('occupation') }}">
        @include('includes.forms.options-occupation')
        </select>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="input-block {{ $errors->has('company') ? 'has-error' : '' }}">
        <span class="txt-request">Company:*</span>
        <input type="text" name="company" class="form-control company" data-parsley-required="true" value="{{ old('company') }}"/>
      </div>
    </div>

    <div class="col-sm-12">
      <div class="input-block" {{ $errors->has('country') ? 'has-error' : '' }}">
        <span class="txt-request">Country:*</span>
        <select name="country" class="custom-select country" data-parsley-required="true" value="{{ old('country') }}">
        @include('includes.forms.options-country')
        </select>
      </div>
    </div>

    <div class="col-12">
        <button type="submit" id="request-price-tag" class="btn-request-piece btn-prevent-multiple"> DOWNLOAD PRESS RELEASE</button>
    </div>

  </div>

</form>

<script src="/js/parsley.min.js"></script>
<script type="text/javascript">
  $(".origin").val(tracker.url_origin);
  $(".referrer").val(tracker.referrer);
  $(".lead_path").val(tracker.flow);

  $(".form-parsley").on('submit', function(e){

      var form = $(this);

      form.parsley().validate();

      if (!form.parsley().isValid()){
          e.preventDefault();
      } else {
        $('.btn-prevent-multiple').attr('disabled', 'true');
        $('.spinner-visible').show();
      }

  });
</script>

</body>
</html>
