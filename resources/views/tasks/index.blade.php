@extends('layouts.app')

@section('title')
{{ $title }}
@endsection

@section('content')

<x-tasks.modal :categories="$categories"/>

<section class="vh-100">
  
  {{-- Componete de erro --}}
  <x-tasks.error :erros="$errors->all()"/>

  {{-- Componete de navegação --}}
  <x-tasks.nav />
  
  {{-- Conponente de tarefas --}}
  <x-tasks :tasks="$tasks">
    <x-tasks.item />
  </x-tasks> 

</section>  
@endsection