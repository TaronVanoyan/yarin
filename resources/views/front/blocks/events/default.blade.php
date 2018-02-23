
<div class="row box">
    <div class="left-side">
        <div id="coll-{{$event->id}}" class="left-side-inner collapse in">
            <p class="box-date"><span>20.01.2018</span></p>
            <p class="box-date-under"><span>ום שני, שעה 18:30 | בית הלל 10, תל-אביב</span></p>
            <div class="middle-layer">
                <div class="under-date-box">
                    <div class="inner-under-date-box">
                        <p><span>תסרוקת?</span></p>
                        <p ><span>השתלמות מעשית</span></p>
                    </div>
                </div>
                <div>
                    <ul class="info-nav">
                        <li>
                            <a >איפור כלה</a>
                        </li>
                        <li>
                            <a>קונטור</a>
                        </li>

                        <li>
                            <a>גלאם</a>
                        </li>
                    </ul>
                    <ul class="fore-more-button">
                        <li>
                            <a class="fore-more"> תסרוקות</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @include("front.common.event_modal",['id'=>$event->id])
        <div id="coll-event-{{$event->id}}" class="left-side-inner collapse in">
            <div class="white-layer">
                <p>
                    <span>משך ההשתלמות</span><br>
                    <span>90 דקות</span>
                </p>
                <p>
                    <span>קהל יעד</span><br>
                    <span>מאפרים</span>
                </p>
                <p>
                    <span>עלות</span><br>
                    <span>149ש”ח</span>
                </p>
            </div>
            <div class="white-layer white-layer-second">
                <p>
                </p>
                <p></p>
                <p>
                            <span>*ההשתלמות הינה ללא עלות לזכאים-
                                    לבדיקת זכאותך השאר פרטייך.
                            </span>
                    <button class="more-button" data-toggle="collapse" data-target="#coll-{{$event->id}},#form-modal-{{$event->id}},#coll-event-{{$event->id}}" aria-hidden="true">פרטים נוספים</button>
                </p>
            </div>
        </div>


    </div>
    <div class="col-xl- right-side">
        <div class="teacher-image">

            <div class="teacher-image-container">
                @include("common.img",['image'=>$event->thumbnail])
                <p class="girl-box-down">
                    <span>כלות גלאם חורף 2018</span><br>
                    <span class="teacher-name-right">{{$event->teacher->name}}</span>
                </p>
            </div>
        </div>
        <div class="event-title">
            <p class="right-rotate-element">
                <span>{{$event->eventType->name}}</span>
            </p>
        </div>
    </div>
</div>