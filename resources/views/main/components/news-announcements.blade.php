<section id="news-announce">
    <div class="news-announce-row">

        <h1>News & Announcements</h1>
            <div class="news-announce-col">
            @foreach($announce as $item)
                <div class="na-card">
                    <div class="na-date">
                        <h4>JAN 11</h4>
                        <h2>2021</h2>
                    </div>
                    <div class="na-content">
                        <h5>{{ $item->subject}}</h5>
                        <p>{{ $item->description}}</p>
                    </div>
                </div>

                

                <!-- <div class="na-card">
                    <div class="na-date">
                        <h4>JAN 11</h4>
                        <h2>2021</h2>
                    </div>
                    <div class="na-content">
                        <h5>Subject</h5>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sapiente, facilis dignissimos repellendus, sint perspiciatis sed necessitatibus quam iusto, temporibus pariatur doloribus quidem provident in expedita amet unde animi. Est, beatae.</p>
                    </div>
                </div> -->

            @endforeach
            </div>
    </div>
</section>