var current_offset = null;
const fetchFilters = async () => {
    const response = await fetch('fetch_filters.php');
    const data = await response.json();

    let html = '';

    data.professions.forEach(profession => {
        html += `
            <div class="form-check">
                <input class="form-check-input profession-filter" type="checkbox" value="${profession}" id="profession-${profession}">
                <label class="form-check-label" for="profession-${profession}">
                    ${profession}
                </label>
            </div>
        `;
    });

    data.institutes.forEach(institute => {
        html += `
            <div class="form-check">
                <input class="form-check-input institute-filter" type="checkbox" value="${institute}" id="institute-${institute}">
                <label class="form-check-label" for="institute-${institute}">
                    ${institute}
                </label>
            </div>
        `;
    });

    document.getElementById('filters').innerHTML = html;
};


const fetchDoctors = async (offset = 0) => {
    const profession_filter = Array.from(document.querySelectorAll('.profession-filter:checked')).map(input => input.value);
    const institute_filter = Array.from(document.querySelectorAll('.institute-filter:checked')).map(input => input.value);
    document.getElementById('doctors-grid').style.visibility='hidden';
    const url = new URL('views/fetch_doctors.php', window.location.origin);
    url.searchParams.set('offset', offset);
    current_offset = offset;

    if (profession_filter.length > 0) {
        url.searchParams.set('profession_filter', JSON.stringify(profession_filter));
    }

    if (institute_filter.length > 0) {
        url.searchParams.set('institute_filter', JSON.stringify(institute_filter));
    }

    updatePagination(offset, JSON.stringify(profession_filter), JSON.stringify(institute_filter));
    // console.log(profession_filter)
    
    // Show the loader
    document.getElementById('loader').style.display = 'block';
    

    const response = await fetch(url);
    // console.log(response)
    const doctors = await response.json();

    document.getElementById('loader').style.display = 'none';
    document.getElementById('doctors-grid').style.visibility='visible';
    let html = '';

    doctors.forEach(doctor => {
        // console.log(doctor);
        var total_avg = (parseFloat(doctor.question1) + parseFloat(doctor.question2) + parseFloat(doctor.question3) + parseFloat(doctor.question4) + parseFloat(doctor.question5)) / 5;

        if(!total_avg){
            total_avg=0;
        }
// console.log(doctor.did);
        html += `
        <div class="col-sm-6 col-lg-4 mb-4">
        <a href="doctor.php?id=${doctor.did}">
        <div class="candidate-list candidate-grid">
                        <div class="candidate-list-image">`;
        var img = "";
        if (doctor.gender == 'male') {
            img = "/assets/images/male-doctor.jpg";
        } else {
            img = "/assets/images/female-doctor.jpg"
        }
        html += `
                            <img class="img-fluid" src="${img}" alt="">
                        </div>
                        <div class="candidate-list-details">
                            <div class="candidate-list-info">
                                <div class="candidate-list-title">
                                    <h5><a href="doctor.php?id=${doctor.did}">${doctor.name}</a></h5>
                                </div>
                                <div class="candidate-list-option">
                                    <span class="fa fa-star star-active mx-1" style="color:gold;"></span> ${total_avg} (${doctor.ratings_count} votes)<br />
                                    <div style="padding-top:10px;"></div>
                                        <span class="text-muted font-weight-normal badge badge-secondary" style="background: #eeeeee;
    padding: 6px; font-size:15px;">${doctor.profession_1}</span>
                                   
                                </div>
                            </div><br />
                        </div>
                    </div>
                    </a>            
                </div>

           
        `;
    });

    document.getElementById('doctors-grid').innerHTML = html;
};

// const fetchDoctorsCount = async () => {
//     const response = await fetch('fetch_doctors_count.php');
//     const data = await response.json();
//     const totalPages = Math.ceil(data.total / 15);
//     const currentPage = current_offset / 15;

//     let html = `
//         <ul class="pagination">
//             <li class="page-item"><a class="page-link" href="#" data-page="0">First</a></li>
//     `;

//     // Display ellipsis if the current page is greater than 4
//     if (currentPage > 3) {
//       html += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
//     }

//     // Display the active page and its three neighboring pages
//     const startPage = Math.max(1, currentPage - 1);
//     const endPage = Math.min(totalPages - 2, currentPage + 2);

//     for (let i = startPage; i <= endPage; i++) {
//       html += `
//             <li class="page-item ${i === currentPage ? "active" : ""}"><a class="page-link" href="#" data-page="${i * 15}">${i + 1}</a></li>
//         `;
//     }

//     // Display ellipsis if there are more than 4 pages after the current page
//     if (totalPages - currentPage > 4) {
//       html += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
//     }

//     html += `
//             <li class="page-item"><a class="page-link" href="#" data-page="${(totalPages - 1) * 15}">Last</a></li>
//         </ul>
//     `;

//     document.getElementById('pagination').innerHTML = html;

// };


async function fetchDoctorsCount(professionFilter, instituteFilter) {
    try {
        const response = await fetch(`fetch_doctors_count.php?profession_filter=${professionFilter}&institute_filter=${instituteFilter}`);
        if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

        const data = await response.json();
        return data.total;
    } catch (error) {
        console.error("Fetch error:", error);
        return 0;
    }
}


async function updatePagination(currentOffset, professionFilter, instituteFilter) {
    const doctorsCount = await fetchDoctorsCount(professionFilter, instituteFilter);
    const totalPages = Math.ceil(doctorsCount / 15);

    // Your existing code for updating pagination.
    const currentPage = currentOffset / 15;

    let html = `
    <ul class="pagination">
        <li class="page-item ${currentPage === 0 ? "disabled" : ""}"><a class="page-link" href="#" data-page="0"><i class='fa fa-angle-double-left'></i></a></li>
        <li class="page-item ${currentPage === 0 ? "disabled" : ""}"><a class="page-link" href="#" data-page="${(currentPage - 1) * 15}"><i class='fa fa-angle-left'></i></a></li>
`;

    // Display ellipsis if the current page is greater than 4
    if (currentPage > 3) {
        html += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
    }

    // Display the active page and its seven neighboring pages
    const startPage = Math.max(0, currentPage - 3);
    const endPage = Math.min(totalPages - 1, currentPage + 3);

    for (let i = startPage; i <= endPage; i++) {
        html += `
        <li class="page-item ${i === currentPage ? "active" : ""}"><a class="page-link" href="#" data-page="${i * 15}">${i + 1}</a></li>
    `;
    }

    // Display ellipsis if there are more than 4 pages after the current page
    if (totalPages - currentPage > 4) {
        html += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
    }

    html += `
        <li class="page-item ${currentPage === totalPages - 1 ? "disabled" : ""}"><a class="page-link" href="#" data-page="${(currentPage + 1) * 15}"><i class='fa fa-angle-right'></i></a></li>
        <li class="page-item ${currentPage === totalPages - 1 ? "disabled" : ""}"><a class="page-link" href="#" data-page="${(totalPages - 1) * 15}"><i class='fa fa-angle-double-right'></i></a></li>
    </ul>
`;

    document.getElementById('pagination').innerHTML = html;

}


document.addEventListener('DOMContentLoaded', () => {
    // fetchFilters();
    fetchDoctors();
    fetchDoctorsCount();

    $(".institute-filter,.profession-filter").on("change", function () {
        fetchDoctors();
    })

    document.getElementById('pagination').addEventListener('click', (e) => {
        e.preventDefault();

        if (e.target.tagName === 'A') {
            const page = parseInt(e.target.getAttribute('data-page'));
            console.log(page);
            console.log(current_offset);
            fetchDoctorsCount();
            fetchDoctors(page);
        }
    });
});


function updateDoctors(page) {
    let offset = (page - 1) * doctorsPerPage;
    let professionFilter = getChecked('.profession-checkbox');
    let hospitalFilter = getChecked('.hospital-checkbox');

    fetchDoctors(offset, doctorsPerPage, professionFilter, hospitalFilter)
        .done(function (data) {
            renderDoctors(data.doctors);
            renderPagination(data.total, page);
        });
}