<style>
    .blog-card {
        position: relative;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin-bottom: 2rem;
        /* height: 500px; */
        height: 400px;
    }

    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .blog-card .image-wrapper {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .blog-card .image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .blog-card:hover .image-wrapper img {
        transform: scale(1.05);
    }

    .blog-card .content {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 1.5rem;
        /* padding: 2.5rem; */
        background: linear-gradient(to top,
                rgba(0, 0, 0, 0.95) 0%,
                rgba(0, 0, 0, 0.7) 40%,
                rgba(0, 0, 0, 0.1) 100%);
        color: white;
    }

    .blog-card .date {
        /* font-size: 0.875rem; */
        font-size: 0.85rem;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .blog-card .title {
        font-size: 1.1rem;
        /* font-size: 1.35rem; */
        color: white;
        font-weight: 600;
        margin-bottom: 1.25rem;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .blog-card .title a {
        color: inherit;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .blog-card .title a:hover {
        color: rgba(255, 255, 255, 0.8);
    }

    .blog-card .read-more {
        /* remove font size for full */
        font-size: 0.8rem;
        color: white;
        text-decoration: none;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        padding: 6px 12px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 20px;
    }

    .blog-card .read-more:hover {
        background: rgba(255, 255, 255, 0.3);
        gap: 0.75rem;
    }

    @media (max-width: 768px) {
        .blog-card {
            height: 400px;
        }

        .blog-card .title {
            font-size: 1.2rem;
        }
    }
</style>
