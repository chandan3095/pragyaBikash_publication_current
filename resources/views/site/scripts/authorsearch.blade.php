@push('script-footer')
    <script>
        const urlprefix = `{{ url('/author_search') }}`
        const search_popup_div2 = document.getElementById('search_popup_div')
        const search_popup2 = document.getElementById('search_popup')
        console.log('second')

        const searchAuthor = async (e) => {
            const keyword = e.value
            console.log(keyword);
            // if (keyword.length <= 0) {
            //     search_popup_div2.classList.add('search_box_show')
            //     return
            // }
            console.log(event.keyCode);
            if (event.keyCode === 13) {
                console.log(keyword);
                const url = `{{ route('author.index') }}?name=${encodeURI(keyword)}`
                console.log(url);
                window.location.href = url
            }
            // const url = `${urlprefix}/${keyoword}`
            // try {
            //     const res = await axios.get(url)
            //     console.log('res', res);
            //     const data = res.data

            //     console.log(data.authors)
            //     // if no books found
            //     if (data.length == 0) {
            //         console.log('no books found');
            //         search_popup_div2.classList.remove('search_box_show')
            //         search_popup2.innerHTML = makeHtml2({}, true)
            //         return
            //     }
            //     let html = ''
            //     data.authors.forEach(author => {
            //         html += makeHtml2(author, true)
            //     })
            //     search_popup2.innerHTML = html
            //     search_popup_div2.classList.remove('search_box_show')
            // } catch (error) {
            //     console.log('Error', error);
            // }
        }
        // const makeHtml2 = (row, no_data = false) => {
        //     console.log(row, "hbhb.likj")
        //     if (no_data) {
        //         return `<li class="d-flex justify-content-center align-items-center">
    //                             <div class="search_resilts_row d-flex gap-3">
    //                                 <img src="" alt="" />
    //                                 <div class="d-flex align-items-center">

    //                                     <p class="m-0">No data found</p>
    //                                 </div>
    //                             </div>
    //                         </li>
    //                         <hr class="m-1" />`
        //     }
        //     const format = `<li class="d-flex justify-content-start align-items-center">
    //                                     <a href="{{ url('/book/${row.slug}') }}" class="text-decoration-none text-dark">
    //                             <div class="search_resilts_row d-flex gap-3">
    //                                 <img src="${row.images[0].image_public}" alt="" />
    //                                 <div class="">
    //                                     <h5 class="m-0">${row.name_bengali} </h5>
    //                                     <p>${row.author.name_bengali}</p>
    //                                 </div>
    //                             </div>
    //                         </a>
    //                         </li>
    //                         <hr class="m-1" />`
        //     return format
        // }
    </script>
@endpush
