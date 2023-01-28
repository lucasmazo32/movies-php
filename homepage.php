<!DOCTYPE html>
<html>
<?php echo file_get_contents("header.html"); ?>
<body class="container-2xl p-8">
    <div class="flex mt-10 gap-8">
        <form id="search">
            <div class="flex gap-8 mb-8">
                <div class="form-control w-80">
                    <label for="title" class="label f-fcol">
                        Search by title
                    </label>
                    <input id="title" type="text" class="input input-bordered w-full" placeholder="Avengers" />
                </div>
                <div class="form-control w-24">
                    <label for="date" class="label f-fcol">
                        Date
                    </label>
                    <input id="date" placeholder="YYYY" type="number" class="input input-bordered w-full" />
                </div>
            </div>
            <button type="submit" class="btn">
                Submit
            </button>
        </form>
        <div id="sort-container" class="form-control">
            <label class="label">
                Sort by
            </label>
            <div class="flex gap-4">
                <label class="swap btn swap-rotate">
                    <input type="checkbox" name="order" checked />
                    <div class="swap-on flex gap-2 items-center">
                        Asc
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 19.5v-15m0 0l-6.75 6.75M12 4.5l6.75 6.75"></path>
                        </svg>
                    </div>
                    <div class="swap-off flex gap-2 items-center">
                        Desc
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 m-0">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75"></path>
                        </svg>
                    </div>
                </label>
                <label class="swap btn">
                    <input type="checkbox" name="order-by" checked />
                    <div class="swap-on flex gap-2 items-center">
                        Title
                    </div>
                    <div class="swap-off flex gap-2 items-center">
                        Year
                    </div>
                </label>
            </div>
        </div>
    </div>
    <div class="overflow-x-auto mt-10">
        <table id="table" class="table w-full">
            <thead>
                <th class="w-3/12">Title</th>
                <th class="w-1/12">Year</th>
                <th class="w-1/12">Type</th>
                <th>Poster</th>
            </thead>
            <tbody id="table-body"></tbody>
        </table>
    </div>
    <script src="movie_ordering.js"></script>
</body>
</html>