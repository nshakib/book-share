<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-08-28 12:49:06
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-08-28 12:55:31
 */
?>
<div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@if (Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
</div>
@endif
