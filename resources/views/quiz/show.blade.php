@extends('layouts.app')

@section('title', "$quiz->title")

@section('content')

    @include('layouts.quiz-hero', ['active' => 'quiz'])

@endsection
