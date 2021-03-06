@extends('layout.master')

@section('content')
{!! Form::open() !!}
  <?php
  isset($request->numOfParagraphs) ? $n=$request->numOfParagraphs : $n=1;
  echo Form::selectRange('numOfParagraphs', 1, 20,  $n) . "   ";
  echo Form::label('lNumOfParagraphs', 'Number of Paragraphs');
  echo '<br><br>';
  echo Form::submit('Submit');
  ?>
{!! Form::close() !!}


<p>
  @if(isset($request->numOfParagraphs))
    <?php
      $generator = new Badcow\LoremIpsum\Generator();
      $paragraphs = $generator->getParagraphs($request->numOfParagraphs);
      echo implode('<p>', $paragraphs);
    ?>
  @endif
</p>
@stop
