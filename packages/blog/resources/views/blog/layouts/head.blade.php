<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Ubuntu|Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=EB+Garamond&display=swap" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
@yield('head')
<style>


    /* Footer */
    footer {
        background-color: #1f4a6f;
        padding-bottom: 40px;
        margin-bottom: 0;
        color: white;
        font-family: 'roboto';
    }
    footer h2, footer h3 {
        font-family: 'ubuntu';
    }
    footer a {
        color: #70a7d7;
    }
    footer a:hover {
        color: #337ab7;
    }

    /* Article */
    article {
        font-family: 'roboto';
        font-size: 1.1em;
    }
    article h2, article h3 {
        font-family: 'ubuntu';
        text-transform: uppercase;
    }
    .author {
        margin-top: 15px;
        margin-bottom: 15px;
    }
    .author-image {
        margin-right: 10px;
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        border-radius: 100%;
    }
    .author-name {
        font-size: 1.3em;
    }

    .background-image{
        background-image: url("https://th.bing.com/th/id/R.3023c6b92ab3c5ed98dc88ee684472b3?rik=0gEICOsyW2AZ9w&pid=ImgRaw&r=0");
        background-position: center center ;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        height: 600px;

    }
    .recent-posts-cont {
        list-style-type: none;
        padding-left: 0;
    }

    .author-image {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .article-title {
        display: inline-block;
        vertical-align: middle;
    }

    .publish-day {
        font-size: 3rem;
        margin-top: 0;
    }

    .publish-month {
        font-size: 1.2rem;
    }

</style>
