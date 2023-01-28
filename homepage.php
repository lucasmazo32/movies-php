<!DOCTYPE html>
<html>
<?php echo file_get_contents("header.html"); ?>
<body class="container">
    <div class="f-fcol">
        <div class="search-container">
            <form id="search">
                <div class="search-form">
                    <label class="label f-fcol">
                        Search by title
                        <input id="title" class="search-title" placeholder="Avengers" />
                    </label>
                    <label class="label f-fcol">
                        Date
                        <input id="date" class="search-date" placeholder="YYYY" type="number" />
                    </label>
                </div>
                <button type="submit" class="submit fit">
                    Submit
                </button>
            </form>
            <div id="sort-container" class="sort-container">
                Sort by
                <fieldset>
                    <label>
                        <input type="radio" name="order" value="asc" checked />
                        Asc
                    </label>
                    <label>
                        <input type="radio" name="order" value="desc" />
                        Desc
                    </label>
                </fieldset>
                <fieldset>
                    <label>
                        <input type="radio" name="order-by" value="title" checked />
                        Title
                    </label>
                    <label>
                        <input type="radio" name="order-by" value="year" />
                        Year
                    </label>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="table-container">
        <table id="table" class="table">
            <tr>
                <th>Title</th>
                <th>Year</th>
                <th>Type</th>
                <th>Poster</th>
            </tr>
        </table>
    </div>
    <script src="movie_ordering.js"></script>
</body>
</html>