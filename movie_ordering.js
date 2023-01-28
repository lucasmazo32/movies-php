let movies = []
let order = 'asc'
let orderBy = 'title'

const createMovieElement = (movie) => {
    const tr = document.createElement("tr")
    const title = document.createElement("td")
    title.innerHTML = movie.Title
    const year = document.createElement("td")
    year.innerHTML = movie.Year
    const type = document.createElement("td")
    type.innerHTML = movie.Type
    const poster = document.createElement("td")
    const posterImage = document.createElement("img")
    posterImage.src = movie.Poster
    posterImage.alt = movie.Title
    poster.append(posterImage)
    tr.append(title, year, type, poster)
    return tr
}

const movieRendering = () => {
    const table = document.getElementById('table')
    table.innerHTML = "<tr><th>Title</th><th>Year</th><th>Type</th><th>Poster</th></tr>"
    const elMovies = movies.map(m => {
        return createMovieElement(m)
    })
    table.append(...elMovies)
}

const movieOrdering = () => {
    const orderFn = (a, b) => {
        if (a > b) {
            return order === 'asc' ? 1 : -1
        }
        if (b > a) {
            return order === 'asc' ? -1 : 1 
        }
        return 0
    }
    movies.sort((m1, m2) => {
        const by = orderBy === 'title' ? 'Title' : 'Year'
        return orderFn(m1[by], m2[by])
    })
    movieRendering()
}

const radioListeners = () => {
    const inputs = document.getElementsByTagName('input')

    const handleChange = (e) => {
        const value = e.target.value
        if (value === 'asc' || value === 'desc') {
            order = value
        } else {
            orderBy = value
        }
        movieOrdering()
    }
    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].type === 'radio') {
            inputs[i].addEventListener('change', handleChange)
        }
    }
}

const handleSubmitFn = () => {
    const searchForm = document.getElementById('search')
    const titleElement = document.getElementById('title')
    const dateElement = document.getElementById('date')

    const handleSubmit = (e) => {
        e.preventDefault()
        const title = titleElement.value
        const date = dateElement.value
        fetch(`https://www.omdbapi.com/?s=${title}&apiKey=fc59da33&y=${date}`).then(v => {
            return v.json()
        }).then(data => {
            movies = data.Search
            movieOrdering()
        }).catch(e => console.log(e))
    }

    searchForm.addEventListener('submit', handleSubmit)
}

radioListeners()
handleSubmitFn()