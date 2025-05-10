@extends('layouts.userHotel')
@section('content')
    <div class="blog-container">
        <div class="blog-image-container">
            <img class="blog-image" src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" loading="lazy">
        </div>
        <div class="blog-content">
            <a href="{{ route('blog',$blog->id) }}" class="blog-title">
                {{ $blog->title }}
            </a>
            <div class="blog-meta">
                <!-- date -->
                <div class="blog-date">
                    <span class="date-day">{{ jdate($blog->created_at)->format('d') }}</span>
                    <span class="date-month">{{ jdate($blog->created_at)->format('M') }}</span>
                </div>
                <!-- text -->
                <p class="blog-excerpt">
                    {{ preg_replace('/\s+/', ' ', trim(html_entity_decode(strip_tags($blog->content)))) }}
                </p>
            </div>
        </div>
    </div>

    <style>
        /* استایل کلی */
        .blog-container {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 26px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            background: white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .blog-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
        }

        /* استایل تصویر */
        .blog-image-container {
            width: 100%;
            overflow: hidden;
            border-radius: 12px;
        }

        .blog-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .blog-image:hover {
            transform: scale(1.03);
        }

        /* استایل محتوا */
        .blog-content {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* استایل عنوان */
        .blog-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2e7d32;
            text-decoration: none;
            transition: color 0.3s ease;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .blog-title:hover {
            color: #1b5e20;
            text-decoration: underline;
        }

        /* استایل متادیتا */
        .blog-meta {
            width: 100%;
            display: grid;
            grid-template-columns: 54px 1fr;
            gap: 16px;
            align-items: center;
        }

        /* استایل تاریخ */
        .blog-date {
            width: 54px;
            aspect-ratio: 1;
            border-radius: 7px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: #2e7d32;
            color: white;
            text-align: center;
            font-weight: bold;
            line-height: 1;
        }

        .date-day {
            font-size: 18px;
        }

        .date-month {
            font-size: 14px;
            text-transform: uppercase;
        }

        /* استایل خلاصه مطلب */
        .blog-excerpt {
            width: 100%;
            font-size: 0.875rem;
            color: #666;
            font-weight: normal;
            line-height: 1.75;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* رسپانسیو */
        @media (max-width: 768px) {
            .blog-image {
                height: 220px;
            }

            .blog-meta {
                grid-template-columns: 1fr;
            }

            .blog-date {
                display: none;
            }

            .blog-title {
                font-size: 1.25rem;
            }
        }
    </style>
@endsection
