Vue.prototype.getDetails = function (component) {
        axios
            .get(`https://api.themoviedb.org/3/movie/${component.key}?api_key=c5850ed73901b8d268d0898a8a9d8bff&language=en`)
            .then(details => {
                let res = details.data;
                
                res.poster_path = 'https://image.tmdb.org/t/p/w500' + res.poster_path;
                component.modalContent = res;              
            });
}

Vue.prototype.searchPosts = function (component) {
    component.filterby = [];
    if (!component.filtered) {
        axios
            .get(`./posts?q=${component.keyword}`)
            .then(response => {
                let  seek = response.data, i, t;

                t = seek.data.length;

                if (seek.data.length === 0) {
                    component.filtered = true;
                }

                for (i = 0; i < t; i++) {
                    component.filterby.push(seek.data[i]);
                }

                component.j++;
            });

            component.requesting = false;
    }
}

Vue.prototype.getMovies = function (component) {
    let upcoming = `https://api.themoviedb.org/3/movie/upcoming?api_key=c5850ed73901b8d268d0898a8a9d8bff&language=en&page=${component.i}`;

component.requesting = true;

if (!component.requested) {

    axios
        .get(upcoming)
        .then(response => {
            let  res = response.data, i, t;

            t = res.results.length;

            if (res.results.length === 0) {
                component.requested = true
            }

            for (i = 0; i < t; i++) {
                res.results[i].poster_path = 'https://image.tmdb.org/t/p/w500/' + res.results[i].poster_path;
                component.posts.push(res.results[i]);
            }

            component.z = i;
            component.i++;
        });

        component.requesting = false;
}
component.revalidate();
}

