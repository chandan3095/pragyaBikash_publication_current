@push('script-footer')
<script>
    const url_prefix = `{{ url('/search') }}`
    const search_popup_div = document.getElementById('search_popup_div')
    const search_popup = document.getElementById('search_popup')
    
    const searchBook = async (e) => {
        const keyoword = e.value
        console.log(keyoword.length);
        if (keyoword.length <= 3) {
            search_popup_div.classList.add('search_box_show')
            return
        }
        const url = `${url_prefix}/${keyoword}`
        try {
            const res = await axios.get(url)
            console.log('res', res);
            const data = res.data
            // if no books found
            if (data.length == 0) {
                console.log('no books found');
                search_popup_div.classList.remove('search_box_show')
                search_popup.innerHTML = makeHtml({}, true)
                return
            }
            let html = ''
            data.forEach(book => {
                html += makeHtml(book)
            })
            search_popup.innerHTML = html
            search_popup_div.classList.remove('search_box_show')
        } catch (error) {
            console.log('Error', error);
        }
    }
    const makeHtml = (row, no_data = false) => {
        if (no_data) {
            return `<li class="d-flex justify-content-center align-items-center">
                                    <div class="search_resilts_row d-flex gap-3">
                                        <img src="" alt="" />
                                        <div class="d-flex align-items-center">
                                            <p class="m-0">No data found</p>
                                        </div>
                                    </div>
                                </li>
                                <hr class="m-1" />`
        }
        const format = `<li class="d-flex justify-content-start align-items-center">
                                            <a href="{{ url('/book/${row.slug}') }}" class="text-decoration-none text-dark">
                                    <div class="search_resilts_row d-flex gap-3">
                                        <img src="${row.images[0].image_public}" alt="" />
                                        <div class="">
                                            <h5 class="m-0">${row.bengali_name} </h5>
                                            <p>${row.author.name_bengali}</p>
                                        </div>
                                    </div>
                                </a>
                                </li>
                                <hr class="m-1" />`
        return format
    }
</script>
@endpush