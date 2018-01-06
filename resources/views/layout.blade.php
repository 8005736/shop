<!doctype html>
<html>
    @include("pieces/head")
    <body>
        <div class="wrap">
            <div class="clearfix">
                @include("pieces/menu")
                @include("pieces/pagetitle")
                @section("main")

                @show          
            </div>
        </div>
    </body>
</html>