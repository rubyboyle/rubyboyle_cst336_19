// JavaScript File
function printContact(contact) {
    var contactList = document.getElementById("contact-list");

    //<li class="list-group-item">
    var contactListItem = document.createElement("li");
    contactListItem.setAttribute("class", "list-group-item")
    contactList.appendChild(contactListItem);

    //    <div class="row w-100">
    var rowDiv = document.createElement("div");
    rowDiv.setAttribute("class", "row w-100");
    // Very important step here!
    contactListItem.appendChild(rowDiv);

    //        <div class="col-12 col-sm-6 col-md-3 px-0">
    var pictureColumnDiv = document.createElement("div");
    pictureColumnDiv.setAttribute("class", "col-12 col-sm-6 col-md-3 px-0");
    // Very important step here!
    rowDiv.appendChild(pictureColumnDiv);

    //            <img src="http://demos.themes.guide/bodeo/assets/images/users/m101.jpg" alt="Mike Anamendolla" class="rounded-circle mx-auto d-block img-fluid">
    var pictureImg = document.createElement("img");
    pictureImg.setAttribute("class", "rounded-circle mx-auto d-block img-fluid");
    pictureImg.setAttribute("src", contact.pictureUrl);
    pictureImg.setAttribute("alt", contact.name);
    // Very important step here!
    pictureColumnDiv.appendChild(pictureImg);

    //        </div>
    // DON'T NEED CODE--JUST A CLOSE TAG

    //        <div class="col-12 col-sm-6 col-md-9 text-center text-sm-left">
    var infoColumnDiv = document.createElement("div");
    infoColumnDiv.setAttribute("class", "col-12 col-sm-6 col-md-9 text-center text-sm-left");
    rowDiv.appendChild(infoColumnDiv);

    //            <span class="fa fa-mobile fa-2x text-success float-right pulse" title="online now"></span>
    var presenceSpan = document.createElement("span");
    presenceSpan.setAttribute("class", "fa fa-mobile fa-2x text-success float-right pulse");
    presenceSpan.setAttribute("title", "online now");
    infoColumnDiv.appendChild(presenceSpan);

    //            <label class="name lead">Mike Anamendolla</label>
    var nameLabel = document.createElement("label");
    nameLabel.setAttribute("class", "name lead");
    nameLabel.innerHTML = contact.name;
    infoColumnDiv.appendChild(nameLabel);

    //            <br>
    var nameLineBreak = document.createElement("br");
    infoColumnDiv.appendChild(nameLineBreak);

    //            <span class="fa fa-map-marker fa-fw text-muted" data-toggle="tooltip" title="" data-original-title="5842 Hillcrest Rd"></span>
    var addressActionSpan = document.createElement("span");
    addressActionSpan.setAttribute("class", "fa fa-map-marker fa-fw text-muted");
    addressActionSpan.setAttribute("data-toggle", "tooltip");
    addressActionSpan.setAttribute("data-original-title", contact.address);
    addressActionSpan.setAttribute("title", "");
    infoColumnDiv.appendChild(addressActionSpan);

    //            <span class="text-muted">5842 Hillcrest Rd</span>
    var addressSpan = document.createElement("span");
    addressSpan.setAttribute("class", "text-muted");
    addressSpan.innerHTML = contact.address;
    infoColumnDiv.appendChild(addressSpan);

    //            <br>
    var addressLineBreak = document.createElement("br");
    infoColumnDiv.appendChild(addressLineBreak);

    //            <span class="fa fa-phone fa-fw text-muted" data-toggle="tooltip" title="" data-original-title="(870) 288-4149"></span>
    var phoneActionSpan = document.createElement("span");
    phoneActionSpan.setAttribute("class", "fa fa-phone fa-fw text-muted");
    phoneActionSpan.setAttribute("data-toggle", "tooltip");
    phoneActionSpan.setAttribute("data-original-title", contact.phone);
    phoneActionSpan.setAttribute("title", "");
    infoColumnDiv.appendChild(phoneActionSpan);

    //            <span class="text-muted small">(870) 288-4149</span>
    var phoneSpan = document.createElement("span");
    phoneSpan.setAttribute("class", "text-muted small");
    phoneSpan.innerHTML = contact.phone;
    infoColumnDiv.appendChild(phoneSpan);

    //            <br>
    var phoneLineBreak = document.createElement("br");
    infoColumnDiv.appendChild(phoneLineBreak);

    //            <span class="fa fa-envelope fa-fw text-muted" data-toggle="tooltip" data-original-title="" title=""></span>
    var emailActionSpan = document.createElement("span");
    emailActionSpan.setAttribute("class", "fa fa-envelope fa-fw text-muted");
    emailActionSpan.setAttribute("data-toggle", "tooltip");
    emailActionSpan.setAttribute("data-original-title", "");
    emailActionSpan.setAttribute("title", "");
    infoColumnDiv.appendChild(emailActionSpan);

    //            <span class="text-muted small text-truncate">mike.ana@example.com</span>
    var emailSpan = document.createElement("span");
    emailSpan.setAttribute("class", "text-muted small text-truncate");
    emailSpan.innerHTML = contact.email;
    infoColumnDiv.appendChild(emailSpan);


}