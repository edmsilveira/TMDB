{{-- Site Meta --}}
<title>@yield('title', trans('globals.title'))</title>
<meta name="description" content="@yield('description',  trans('globals.description'))"/>

{{-- Google + --}}
<meta itemprop="name" content="@yield('title', trans('globals.title'))"/>
<meta itemprop="description" content="@yield('description',  trans('globals.description'))"/>
<meta itemprop="image" content="@yield('share_img', trans('globals.image-share'))"/>

{{-- Twitter --}}
<meta name="twitter:card" content="@yield('share_img', trans('globals.image-share'))"/>
<meta name="twitter:title" content="@yield('title', trans('globals.title'))"/>
<meta name="twitter:description" content="@yield('short_description',  trans('globals.description'))"/>
<meta name="twitter:image:src" content="@yield('share_img', trans('globals.image-share'))"/>

{{-- Open Graph --}}
<meta property="og:title" content="@yield('title', trans('globals.title'))"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="@yield('url', route('site.feed'))"/>
<meta property="og:image" content="@yield('share_img', trans('globals.image-share'))"/>
<meta property="og:description" content="@yield('description',  trans('globals.description'))"/>
<meta property="og:site_name" content="@yield('title', trans('globals.title'))"/>
<meta property="fb:app_id" content="{{ $fb }}"/>


<script type="application/ld+json">
    {
        "@context":     "http://schema.org",
        "@type":        "Organization",
        "@id":          "Page",
        "legalName":    "Author_Name",
        "url":          "canonical",
        "sameAs": [
            'https://social_network_1',
            'https://social_network_2'
        ],
        "address": {
            "@type":            "PostalAddress",
            "streetAddress":    "Street - Number",
            "addressLocality":  "City",
            "addressRegion":    "State (2)",
            "postalCode":       "zip",
            "addressCountry":   "Coutry (2)"
        },
        "name":                 "Brand/Name",
        "logo":                 "logo_path.svg",
        "contactPoint": {
            "@type":        "ContactPoint",
            "telephone":    "+0(00)Number",
            "email":        "x@x.x",
            "contactType":  "Customer service"
        }
    }
</script>
<script type="application/ld+json">
    {
        "@context":     "http://schema.org",
        "@type":        "WebSite",
        "name":         "Title",
        "description":  "Description",
        "image":        "share.png",
        "url":          "url",
        "potentialAction" : {
            "@type" :           "SearchAction",
            "target" :          "search?q={search_param}",
            "query-input":      "required name=search_param"
        }
    }
</script>
