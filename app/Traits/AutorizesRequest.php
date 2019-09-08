<?php

namespace App\Traits;


/**
 * Trait para realizar la autorisacion
 */
trait AutorizesRequest
{
    public function resolveAutorization(&$queryParams, &$formParams, &$headers)
    {
        $accessToken = $this->resolveAccessToken();
        $headers['Authorization'] = $accessToken;
    }

    public function resolveAccessToken()
    {
        return 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImQxNjMyMTkzY2IzMWZmOWM0YzFjOTg5YjNkNGNjMTYyOWE3N2M2NzRmYmRjMTIwNmU0ZjBiY2Y2NjU2ZWZiNmJmOGJiOWVkMzA5NTYzZGEwIn0.eyJhdWQiOiI2IiwianRpIjoiZDE2MzIxOTNjYjMxZmY5YzRjMWM5ODliM2Q0Y2MxNjI5YTc3YzY3NGZiZGMxMjA2ZTRmMGJjZjY2NTZlZmI2YmY4YmI5ZWQzMDk1NjNkYTAiLCJpYXQiOjE1Njc5MjEwMDksIm5iZiI6MTU2NzkyMTAwOSwiZXhwIjoxNTk5NTQzNDA5LCJzdWIiOiIxIiwic2NvcGVzIjpbInJlYWQtZ2VuZXJhbCJdfQ.wno_FbT5gmdmlYhtA2beN0py7xEpFaZAzQaKEgSYEpoLaHGS-clcBvsd9vcJGe6t33N8SJGDQeibBTDrx-IJ8IhEgPLSkyj6jnPXZQVFg-rik0yqvthpcq8Ew5aji6KIFBPtflFy42Drp850og28LwnYWQZVsr34srus5yteQxb5txLxEggilyO5r1SBG1JK_7onhx32HoiUQ4sDv6JbaaZDh2yZrR1uUDt5rzOfUATk5lB27xJqerafwkVJ3-4ju54HdByvvXlxQHUyD0nDCfBEG13WJjAp08BHvmdymGnqdvh5kiWnzAebAh6lrlQWA-_0M6pwE_gSsAuClZ-vYeqQ_gf59kXlYuulAaHyLIiuQzSGKLA_XRjTypqF8DPTgGTtO8HHTMUSVA2bwaeoryZX0kSzvItWf7UTaJ_zmg92mlXWEpd7w1N-StJuIyiWRDwxc57F8A9R-R3jIMbpcePAO2phvIsBnEDBh0KFpVovj4N-_SLEAlJRjWGNWqJisvLjrCifX3Tci77u_NkHyN0eN_KXc6RbWosVRwDnvJMoyW2GsFVgQp9EeVDnF-OA7wCRLoJc3D_UY00H7rqMQri1MRcw6YuweLa3MtQXFHrZXsziu6OCs8EnhMR_Vg44qmNmqdiXg5XDUFa4wAnJOOWal3lXuDSB0U1w6TGpHvM';
    }
}
