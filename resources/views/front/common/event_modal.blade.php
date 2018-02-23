<!--    Modal form  start -->
<div class="row " >
    <div class="col collapse" id="form-modal-{{$id}}">
        <p class="close-button">
            <i class="fa fa-times-circle" data-toggle="collapse" data-target="#coll-{{$id}},#form-modal-{{$id}},#coll-event-{{$id}}" aria-hidden="true"></i>
        </p>
        <div>
            <div class="card card-body">
                <div class="black-box-form">
                    <h2>לקבלת פרטים נוספים</h2>
                    <p>מלאי את פרטיך ונשוב אליך בהקדם</p>
                    <form method="" action="" id="person-details-event-{{$id}}">
                        <div class="event-type">
                            <input type="hidden" name="event_id" value="{{$id}}">
                            <p>
                                <label for="details-name-event-{{$id}}">*שם פרטי</label> <br>
                                <input
                                        type="text"
                                        id="details-name-event-{{$id}}"
                                        name="name"
                                        minlength="4"
                                >
                            </p>
                            <p>
                                <label for="details-lastName-event-{{$id}}">שם משפחה</label> <br>
                                <input
                                        type="text"
                                        id="details-lastName-event-{{$id}}"
                                        name="lastname"
                                        minlength="4"
                                >
                            </p>
                            <p>
                                <label for="details-number-event-{{$id}}">*טלפון נייד</label> <br>
                                <input
                                        type="text"
                                        id="details-number-event-{{$id}}"
                                        name="mobile"
                                        minlength="4"
                                >
                            </p>

                            <p class="event-type-checkbox">
                                <input
                                        type="checkbox"
                                        id="event-type-info-event-{{$id}}"
                                        name="feed_back_event"
                                        value="1"
                                >
                                <label for="event-type-info">שלח לי פרטי הגעה וחניונים</label>
                            </p>
                        </div>
                        {{csrf_field()}}
                        <div class="box-form-buttons">
                            <p><button class="send-event post-data" data-url="{{route("front.submit")}}">שליחה</button></p>
                            <p><span>* שדה חובה</span></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--    Modal form  end  -->