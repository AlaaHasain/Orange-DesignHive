@extends('layouts.public')
@section('title', 'DesignHive | Search Results')
@section('content')

<style>
    /* تنسيقات البحث العامة */
    .main {
        padding: 40px 0;
    }
    
    /* تنسيقات البطاقات */
    .project-item {
        margin-bottom: 30px;
        transition: transform 0.3s ease;
    }
    
    .project-item:hover {
        transform: translateY(-5px);
    }
    
    /* تنسيقات فئات البحث */
    .blog-item {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        margin-bottom: 30px;
    }
    
    .blog-item:hover {
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        transform: translateY(-5px);
    }
    
    .blog-item img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-bottom: 3px solid #420363;
    }
    
    .blog-content {
        padding: 20px;
    }
    
    .post-title a {
        color: #333;
        font-weight: 600;
        text-decoration: none;
        transition: color 0.3s;
    }
    
    .post-title a:hover {
        color: #420363;
    }
    
    /* رسالة عدم وجود نتائج */
    .no-results {
        text-align: center;
        padding: 80px 20px;
        background: #f9f9f9;
        border-radius: 12px;
        margin: 40px 0;
    }
    
    .no-results h2 {
        color: #420363;
        margin-bottom: 15px;
        font-weight: 700;
    }
    
    .no-results p {
        color: #666;
        font-size: 18px;
    }
    
    /* عناوين الأقسام */
    .section-title {
        color: #420363;
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
        font-weight: 700;
    }
</style>

<main class="main">
    <div class="container">
        @if($projects->isEmpty() && $categoriesSearch->isEmpty())
            <div class="no-results">
                <h2>No Results Found</h2>
                <p>Sorry, we couldn't find any projects or categories matching your search.</p>
            </div>
        @else
            @if(!$projects->isEmpty())
                <h2 class="section-title">Projects</h2>
                <div class="row gy-4 mb-5">
                    @foreach($projects as $project)
                        <div class="col-lg-4 col-md-6 project-item">
                            @include('layouts.public.__projects', ['project' => $project])
                        </div>
                    @endforeach
                </div>
            @endif
            
            @if(!$categoriesSearch->isEmpty())
                <h2 class="section-title">Categories</h2>
                <div class="row gy-4">
                    @foreach($categoriesSearch as $category)
                        @php
                            $name = $category->name ?: 'No Category Name';
                            $image = Str::startsWith($category->image, ['http://', 'https://']) 
                                    ? $category->image 
                                    : ($category->image ? asset($category->image) : asset('assets/img/blog/blog-hero-2.webp'));
                        @endphp
                        <div class="col-lg-4 col-md-6">
                            <article class="blog-item" data-aos="fade-up">
                                <a href="{{ route('category.posts', $category->id) }}">
                                    <img src="{{ $image }}" alt="{{ $name }}" class="img-fluid">
                                </a>
                                <div class="blog-content">
                                    <h3 class="post-title">
                                        <a href="{{ route('category.posts', $category->id) }}" title="{{ $name }}">
                                            {{ $name }}
                                        </a>
                                    </h3>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            @endif
        @endif
    </div>
</main>
@endsection