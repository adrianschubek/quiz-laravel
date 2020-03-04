@extends('layouts.app')

@section('title', "Suchen")

@section('content')
    <livewire:search :query="$query"/>
@endsection
