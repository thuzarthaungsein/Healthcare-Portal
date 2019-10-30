<template>
  <div class="search-map" @click="getStateClick" @mouseover="getStateHover">
    <div class="row" id="hos">
      <div class="col-md-12">
        <div class="row">
          <!-- search map and path -->
          <div class="col-sm-11 map-wrap" id="searchMap">
            <div class="divisions">
              <div class="row">
                <div class="col-sm-2 hokkaido-box">
                  <div class="card mb-3">
                    <div class="card-header pad-10" style="background-color:#6699cc">北海道・東北</div>
                    <div class="card-body">
                      <p class="card-text map-text">
                        <span class="spanclass">
                          <a href="#" id="1" data-info="Hokkaido" class="path Hokkaido card-text">北海道</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="2" data-info="Aomori" class="path Aomori card-text">青森県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="3" data-info="Iwate" class="path Iwate card-text">岩手県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="4" data-info="Miyagi" class="path Miyagi card-text">宮城県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="5" data-info="Akita" class="path Akita card-text">秋田県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="6" data-info="Yamagata" class="path Yamagata card-text">山形県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="7" data-info="Fukushima" class="path Fukushima card-text">福島県</a>
                        </span>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-2 kanto-box">
                  <div class="card mb-3">
                    <div class="card-header pad-10" style="background-color:#71d5cb">関東</div>
                    <div class="card-body">
                      <p class="card-text map-text">
                        <span class="spanclass">
                          <a href="#" id="8" data-info="Ibaraki" class="path Ibaraki card-text">茨城県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="9" data-info="Tochigi" class="path Tochigi card-text">栃木県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="10" data-info="Gunma" class="path Gunma card-text">群馬県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="11" data-info="Saitama" class="path Saitama card-text">埼玉県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="12" data-info="Chiba" class="path Chiba card-text">千葉県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="13" data-info="Tokyo" class="path Tokyo card-text">東京都</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="14" data-info="Kanagawa" class="path Kanagawa card-text">神奈川県</a>
                        </span>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-3 hokuriku-box">
                  <div class="card mb-3">
                    <div class="card-header pad-10" style="background-color:#75b777">北陸</div>
                    <div class="card-body">
                      <p class="card-text map-text">
                        <span class="spanclass">
                          <a href="#" id="15" data-info="Niigata" class="path Niigata card-text">新潟県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="16" data-info="Toyama" class="path Toyama card-text">富山県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="17" data-info="Ishikawa" class="path Ishikawa card-text">石川県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="18" data-info="Fukui" class="path Fukui card-text">福井県</a>
                        </span>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-3 tokai-box">
                  <div class="card mb-3">
                    <div class="card-header pad-10" style="background-color:#c0c743">東海甲信</div>
                    <div class="card-body">
                      <p class="card-text map-text">
                        <span class="spanclass">
                          <a href="#" id="19" data-info="Yamanashi" class="path Yamanashi card-text">山梨県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="20" data-info="Nagano" class="path Nagano card-text">長野県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="21" data-info="Gifu" class="path Gifu card-text">岐阜県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="22" data-info="Shizuoka" class="path Shizuoka card-text">静岡県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="23" data-info="Aichi" class="path Aichi card-text">愛知県</a>
                        </span>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4 kinki-box">
                  <div class="card mb-3">
                    <div class="card-header pad-10" style="background:#efb838">近畿</div>
                    <div class="card-body">
                      <p class="card-text map-text">
                        <span class="spanclass">
                          <a href="#" id="24" data-info="Mie" class="path Mie card-text">三重県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="25" data-info="Shiga" class="path Shiga card-text">滋賀県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="26" data-info="Kyoto" class="path Kyoto card-text">京都府</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="27" data-info="Osaka" class="path Osaka card-text">大阪府</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="28" data-info="Hyogo" class="path Hyogo card-text">兵庫県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="29" data-info="Nara" class="path Nara card-text">奈良県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="30" data-info="Wakayama" class="path Wakayama card-text">和歌山県</a>
                        </span>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-3 chugoku-box">
                  <div class="card mb-3">
                    <div class="card-header pad-10" style="background:#f58c3f;">中国</div>
                    <div class="card-body">
                      <p class="card-text map-text">
                        <span class="spanclass">
                          <a href="#" id="31" data-info="Tottori" class="path Tottori card-text">鳥取県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="32" data-info="Shimane" class="path Shimane card-text">島根県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="33" data-info="Okayama" class="path Okayama card-text">岡山県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="34" data-info="Hiroshima" class="path Hiroshima card-text">広島県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="35" data-info="Yamaguchi" class="path Yamaguchi card-text">山口県</a>
                        </span>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-3 shikoku-box">
                  <div class="card mb-3">
                    <div class="card-header pad-10" style="background:#f1a296;">四国</div>
                    <div class="card-body">
                      <p class="card-text map-text">
                        <span class="spanclass">
                          <a href="#" id="36" data-info="Tokushima" class="path Tokushima card-text">徳島県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="37" data-info="Kagawa" class="path Kagawa card-text">香川県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="38" data-info="Ehime" class="path Ehime card-text">愛媛県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="39" data-info="Kochi" class="path Kochi card-text">高知県</a>
                        </span>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-2 okinawa-box">
                  <div class="card mb-3">
                    <div class="card-header pad-10" style="background-color:#e77a72;">九州・沖縄</div>
                    <div class="card-body">
                      <p class="card-text map-text">
                        <span class="spanclass">
                          <a href="#" id="40" data-info="Fukuoka" class="path Fukuoka card-text">福岡県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="41" data-info="Saga" class="path Saga card-text">佐賀県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="42" data-info="Nagasaki" class="path Nagasaki card-text">長崎県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="43" data-info="Kumamoto" class="path Kumamoto card-text">熊本県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="44" data-info="Oita" class="path Oita card-text">大分県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="45" data-info="Miyazaki" class="path Miyazaki card-text">宮崎県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="46" data-info="Kagoshima" class="path Kagoshima card-text">鹿児島県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="47" data-info="Okinawa" class="path Okinawa card-text">沖縄県</a>
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="map">
              <svg class="map_svg" viewBox="88 220 400 420" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" mapsvg:geoViewBox="123.658963 45.523885 145.820743 24.217586" width="100%" height="730">
                <path id="1" data-info="Hokkaido" title="Hokkaido" class="path Hokkaido" stroke="#333333" fill="#6699cc" d="M378.27,247.63h86.97v55.8h-62.62l0.09,8.05h-24.44V247.63z" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-6121795b id="2" data-info="Aomori" title="Aomori" stroke="#333333" fill="#6699cc" d="M377.33,317.77h65.18v21.09h-65.18V317.77z" class="path Aomori" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-6121795b id="3" data-info="Iwate" title="Iwate" stroke="#333333" fill="#6699cc" d="M377.33,338.86h32.59v23.24h-32.59V338.86z" class="path Iwate" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-6121795b id="4" data-info="Miyagi" title="Miyagi" stroke="#333333" fill="#6699cc" d="M409.92,338.86h32.59v23.24h-32.59V338.86z" class="path Miyagi" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-6121795b id="5" data-info="Akita" title="Akita" stroke="#333333" fill="#6699cc" d="M377.33,362.11h32.59v24.01h-19.39l-0.13-8.34l-13.07-0.13V362.11z" class="path Akita" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="6" data-info="Yamagata" title="Yamagata" stroke="#333333" fill="#6699cc" d="M442.51,362.11v24.01h-32.59v-24.01H442.51z" class="path Yamagata" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="7" data-info="Fukushima" title="Fukushima" stroke="#333333" fill="#6699cc" d="M390.53,386.12h51.98v23.62h-52.48L390.53,386.12z" class="path Fukushima" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="8" data-info="Ibaraki" title="Ibaraki" stroke="#333333" fill="#71d5cb" d="M426.21,440.8l-0.51-31.06h16.8v31.06H426.21z" class="path Ibaraki" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="9" data-info="Tochigi" title="Tochigi" stroke="#333333" fill="#71d5cb" d="M401.96,409.74h23.75v23.36h-23.75V409.74z" class="path Tochigi" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="10" data-info="Gunma" title="Gunma" stroke="#333333" fill="#71d5cb" d="M378.46,409.74h23.49v23.36h-23.49V409.74z" class="path Gunma" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="11" data-info="Saitama" title="Saitama" stroke="#333333" fill="#71d5cb" d="M425.71,433.09v19.45h-47.24v-19.45H425.71z" class="path Saitama" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="12" data-info="Chiba" title="Chiba" stroke="#333333" fill="#71d5cb" d="M426.21,440.8h16.29v56.21c0,0-16.04,1.26-16.29,0C425.96,495.75,426.21,440.8,426.21,440.8z" class="path Chiba" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="13" data-info="Tokyo" title="Tokyo" stroke="#333333" fill="#71d5cb" d="M390.02,453.18l35.68-0.63v13.77h-10.86l0.13,6.57h-24.76L390.02,453.18z" class="path Tokyo" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="14" data-info="Kanagawa" title="Kanagawa" stroke="#333333" fill="#71d5cb" d="M378.46,472.88h36.51v24.69l-24.95-0.44v-12.63l-11.56,0.13V472.88z" class="path Kanagawa" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="15" data-info="Niigata" title="Niigata" stroke="#333333" fill="#75b777" d="M377.33,377.65l13.07,0.13l-0.38,31.96h-31.26v-24.83h18.32L377.33,377.65z" class="path Niigata" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="16" data-info="Toyama" title="Toyama" stroke="#333333" fill="#75b777" d="M335.07,384.91h23.68v24.83h-23.68V384.91z" class="path Toyama" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="17" data-info="Ishikawa" title="Ishikawa" stroke="#333333" fill="#75b777" d="M318.59,377.65h16.48v32.08h-16.48V377.65z" class="path Ishikawa" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="18" data-info="Fukui" title="Fukui" stroke="#333333" fill="#75b777" d="M303.05,416.93h15.54v-7.19h16.48v23.36c0,0-32.02,0.44-32.02,0S303.05,416.93,303.05,416.93z" class="path Fukui" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="19" data-info="Yamanashi" title="Yamanashi" stroke="#333333" fill="#c0c743" d="M366.72,472.06v-19.52l23.31,0.63v18.88H366.72z" class="path Yamanashi" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="20" data-info="Nagano" title="Nagano" stroke="#333333" fill="#c0c743" d="M350.8,409.74h27.66v42.81h-11.75v19.52H350.8V409.74z" class="path Nagano" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="21" data-info="Gifu" title="Gifu" stroke="#333333" fill="#c0c743" d="M335.07,409.74h15.73v62.33h-15.73V409.74z" class="path Gifu" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="22" data-info="Shizuoka" title="Shizuoka" stroke="#333333" fill="#c0c743" d="M358.76,472.88h19.71v11.75l11.56-0.13v12.63l-31.26-0.82V472.88z" class="path Shizuoka" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="23" data-info="Aichi" title="Aichi" stroke="#333333" fill="#c0c743" d="M335.07,472.06l23.68,0.82v23.43h-23.68V472.06z" class="path Aichi" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="24" data-info="Mie" title="Mie" stroke="#333333" fill="#efb838" d="M319.06,456.97h16.01l1.07,55.07h-17.08V456.97z" class="path Mie" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="25" data-info="Shiga" title="Shiga" stroke="#333333" fill="#efb838" d="M319.06,433.29l16.01-0.2v23.87h-16.01V433.29z" class="path Shiga" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="26" data-info="Kyoto" title="Kyoto" stroke="#333333" fill="#efb838" d="M287.89,417.05l15.16-0.13v16.17l16.01,0.2v23.68h-31.17V417.05z" class="path Kyoto" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="27" data-info="Osaka" title="Osaka" stroke="#333333" fill="#efb838" d="M287.89,484.19v-27.22h15.58v27.22H287.89z" class="path Osaka" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="28" data-info="Hyogo" title="Hyogo" stroke="#333333" fill="#efb838" d="M271.73,416.93l16.17,0.13v48h-16.17V416.93z" class="path Hyogo" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="29" data-info="Nara" title="Nara" stroke="#333333" fill="#efb838" d="M303.48,456.97h15.58v39.35h-16.01L303.48,456.97z" class="path Nara" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="30" data-info="Wakayama" title="Wakayama" stroke="#333333" fill="#efb838" d="M303.48,484.19l-0.43,12.13h16.01v15.73h-31.17v-27.85H303.48zz" class="path Wakayama" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="31" data-info="Tottori" title="Tottori" stroke="#333333" fill="#f58c3f" d="M256.32,416.93h15.41v24.06l-15.41-0.19V416.93z" class="path Tottori" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="32" data-info="Shimane" title="Shimane" stroke="#333333" fill="#f58c3f" d="M240.65,416.93h15.66v23.87l-15.66,0.19V416.93zz" class="path Shimane" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="33" data-info="Okayama" title="Okayama" stroke="#333333" fill="#f58c3f" d="M256.32,465.05V440.8l15.41,0.19v24.06H256.32z" class="path Okayama" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="34" data-info="Hiroshima" title="Hiroshima" stroke="#333333" fill="#f58c3f" d="M240.65,440.99l15.66-0.19v24.25h-15.66V440.99z" class="path Hiroshima" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="35" data-info="Yamaguchi" title="Yamaguchi" stroke="#333333" fill="#f58c3f" d="M224.23,416.93h16.42v48.13h-16.42V416.93z" class="path Yamaguchi" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="36" data-info="Tokushima" title="Tokushima" stroke="#333333" fill="#f1a296" d="M279.81,492.59h-27.54v-20.53h27.54V492.59z" class="path Tokushima" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="37" data-info="Kagawa" title="Kagawa" stroke="#333333" fill="#f1a296" d="M224.23,472.06h28.04v20.53h-28.04V472.06z" class="path Kagawa" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="38" data-info="Ehime" title="Ehime" stroke="#333333" fill="#f1a296" d="M224.23,512.04v-19.45h28.04v19.45H224.23z" class="path Ehime" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="39" data-info="Kochi" title="Kochi" stroke="#333333" fill="#f1a296" d="M279.81,512.04h-27.54v-19.45h27.54V512.04z" class="path Kochi" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="40" data-info="Fukuoka" title="Fukuoka" stroke="#333333" fill="#e77a72" d="M162.08,416.93h16.17l-1.26,36l-14.91-0.38V416.93z" class="path Fukuoka" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="41" data-info="Saga" title="Saga" stroke="#333333" fill="#e77a72" d="M145,416.93h17.08v35.62L145,452.93V416.93z" class="path Saga" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="42" data-info="Nagasaki" title="Nagasaki" stroke="#333333" fill="#e77a72" d="M177.75,452.55v-35.62h39.66v16.17h-16.17v19.45H177.75z" class="path Nagasaki" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="43" data-info="Kumamoto" title="Kumamoto" stroke="#333333" fill="#e77a72" d="M217.41,460.76h-16.17v-27.66h16.17V460.76z" class="path Kumamoto" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="44" data-info="Oita" title="Oita" stroke="#333333" fill="#e77a72" d="M217.41,488.04h-16.17v-27.28h16.17V488.04z" class="path Oita" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="45" data-info="Miyazaki" title="Miyazaki" stroke="#333333" fill="#e77a72" d="M177.75,452.55h23.49v35.49h-23.49V452.55z" class="path Miyazaki" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="46" data-info="Kagoshima" title="Kagoshima" stroke="#333333" fill="#e77a72" d="M177.75,488.04h39.66v24h-39.66V488.04z" class="path Kagoshima" v-scroll-to="{ el: '#scroll-map'}" />
                <path data-v-5cde3559 id="47" data-info="Okinawa" title="Okinawa" stroke="#333333" fill="#e77a72" d="M176.99,519.62h16.8V544h-16.8V519.62z" class="path Okinawa" v-scroll-to="{ el: '#scroll-map'}" />
                <path stroke="#333333" fill="none" stroke-width="1.8px" d="M224.23,416.93h94.36v-39.27h16.48v7.25h42l0.25-67.14h65.18v179.24h-16.29l-0.51-30.69h-10.86l-0.05,30.82l-78.94-0.34l-0.07,15.25h-48.27l-0.19-46.42l-63.09-0.57V416.93z" v-scroll-to="{ el: '#scroll-map'}" />
                <path stroke="#333333" fill="none" stroke-width="1.8px" d="M224.23,472.06h55.58v39.98h-55.58V472.06z" v-scroll-to="{ el: '#scroll-map'}" />
                <path stroke="#333333" fill="none" stroke-width="1.8px" d="M145,416.93h72.41v95.12h-39.66v-58.61L145,452.93V416.93z" v-scroll-to="{ el: '#scroll-map'}" />
                <path stroke="#333333" fill="none" stroke-width="1.8px" d="M176.99,519.62h16.8V544h-16.8V519.62z" v-scroll-to="{ el: '#scroll-map'}" />
                <path stroke="#333333" fill="none" stroke-width="1.8px" d="M378.27,248.11l86.97-0.47v55.8h-62.62l-0.19,8.05h-24.16V248.11z" v-scroll-to="{ el: '#scroll-map'}" />
              </svg>
            </div>
          </div>
        </div>
        <!-- search city , township  -->
        <div class="row select" id="filter" style="justify-content:space-between">
          <div class="col-sm-3 col-md-3">
            <div class="card">
              <div class="card-header">Filter by region</div>
              <div class="card-body " style="background-color:#f4f1eb">
                <select id="selectCity" class="form-control   custom-select"  v-model="id">
                  <option  :value="city.id" v-for="city in cities" :key="city.id">{{city.city_name}}</option>
                </select>
                <select id="selectTownship" class="form-control mt-1 custom-select" v-model="id" >
                  <option  :value="selectTownship.id"  v-for="selectTownship in getTownships" :key="selectTownship.id">{{selectTownship.township_name}}</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-md-3">
            <div class="card">
              <div class="card-header">Filter by price</div>
              <div class="card-body" style="background-color:#f4f1eb">
                <div class="">
                  <select name="" id="" class="form-control custom-select">
                    <option data-price-type="" value="">▼入居一時金</option>
                    <option data-price-type="" value="0">一時金なし</option>
                    <option data-price-type="" value="50">50万円以下</option>
                    <option data-price-type="" value="100">100万円以下</option>
                    <option data-price-type="" value="200">200万円以下</option>
                    <option data-price-type="" value="300">300万円以下</option>
                    <option data-price-type="" value="400">400万円以下</option>
                    <option data-price-type="" value="500">500万円以下</option>
                    <option data-price-type="" value="600">600万円以下</option>
                    <option data-price-type="" value="700">700万円以下</option>
                    <option data-price-type="" value="800">800万円以下</option>
                    <option data-price-type="" value="900">900万円以下</option>
                    <option data-price-type="" value="1000">1,000万円以下</option>
                    <option data-price-type="" value="2000">2,000万円以下</option>
                    <option data-price-type="" value="3000">3,000万円以下</option>
                    <option data-price-type="more" value="3000">3,000万円以上</option>
                  </select>
                  <select name="" id="" class="form-control  mt-1 custom-select">
                    <option data-price-type="" value="">▼月額利用料</option>
                    <option data-price-type="" value="10">10万円以下</option>
                    <option data-price-type="" value="12">12万円以下</option>
                    <option data-price-type="" value="14">14万円以下</option>
                    <option data-price-type="" value="16">16万円以下</option>
                    <option data-price-type="" value="18">18万円以下</option>
                    <option data-price-type="" value="20">20万円以下</option>
                    <option data-price-type="" value="22">22万円以下</option>
                    <option data-price-type="" value="24">24万円以下</option>
                    <option data-price-type="" value="26">26万円以下</option>
                    <option data-price-type="" value="28">28万円以下</option>
                    <option data-price-type="" value="30">30万円以下</option>
                    <option data-price-type="" value="35">35万円以下</option>
                    <option data-price-type="" value="40">40万円以下</option>
                    <option data-price-type="" value="45">45万円以下</option>
                    <option data-price-type="" value="50">50万円以下</option>
                    <option data-price-type="more" value="50">50万円以上</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-4 col-md-4">
            <button class="btn btn-outline-info select" id="showSearchMap" @click="showSearchMap">Search With Map</button>
          </div>
        </div>
        <!-- google map  -->
        <div class="row">
          <div class="col-sm-12 col-md-12">
          <div id="holder" style="position: relative;">
              <div class="overlay standard hidden">&nbsp;</div>
              <div id="mymap" class="select"></div>
          </div>
          </div>
        </div>
        <!-- nursing list -->
        <div class="row" id="nrusing-search">
          <div class="card-carousel-wrapper">
            <div class="card-carousel--nav__left" @click="moveCarousel(-1)" :disabled="atHeadOfList"></div>
            <div class="card-carousel">
              <div class="card-carousel--overflow-container">
                <div class="card-carousel-cards" :style="{ transform: 'translateX' + '(' + currentOffset + 'px' + ')'}">
                  <div class="card-carousel--card" v-for="items in nursingList" :key="items.nursing_id">
                    <div class="">

                      <table class="table">
                        <thead>
                          <tr>
                            <th class="text-left text-danger">{{items.num_rooms}}</th>
                            <th class="text-right">{{items.date_of_establishment}}</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td colspan="2" class="text-center">
                              <div class="item-fav btn btn-sm">
                                <i class="fas fa-plus-square"></i> 資料請求 . 見学リスト . 追加
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td colspan="2" class="text-left">
                              <span class="item-name">{{items.name}}</span> <br>
                              <span>{{items.city_name}} <i class="fas fa-angle-double-right"></i> {{items.township_name}}</span>

                            </td>
                          </tr>
                          <tr>
                            <td colspan="2" style="background-color:#ff6117">
                              {{items.type_name}}
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <img :src="'/images/'+items.logo" alt="image" width="150px" />
                            </td>
                            <td>
                              <table class="table table-bordered">
                                <tbody>
                                  <tr>
                                    <td>Address</td>
                                    <td>{{items.address}}</td>
                                  </tr>
                                  <tr>
                                    <td>Phone</td>
                                    <td>{{items.phone}}</td>
                                  </tr>
                                  <tr>
                                    <td>Website</td>
                                    <td><a :href="'http://'+ items.website" target="_blank">{{items.website}}</a></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div style="background-color:#ff6117;padding:10px">Moving In</div>
                            </td>
                            <td>
                              <div style="background-color:#ff6117;padding:10px">Per Month</div>
                            </td>
                          </tr>
                          <tr>
                            <td>{{items.moving_in_to}}</td>
                            <td>{{items.per_month_to}}</td>
                          </tr>
                        </tbody>
                      </table>



                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-carousel--nav__right" @click="moveCarousel(1)" :disabled="atEndOfList"></div>
          </div>

        </div>

        <div class="row row-div select mt-3">
          <div class="col-2 left-div">地域</div>
          <div class="col-10">
            <!-- <select id="select" class="form-control col-3 custom-select mt-2" v-model="id">
              <option v-for="city in cities" :value="city.id" :key="city.id">{{city.city_name}}</option>
            </select>
            <button @click="show = !show" class="btn btn-outline-primary mt-2">
              <span v-show="show"><i class="fas fa-arrow-circle-up"></i> Close Township</span>
              <span v-show="!show"><i class="fas fa-arrow-circle-down"></i> Open Township</span>
            </button> -->
            <hr>
            <div>
              <div class="form-check form-check-inline col-sm-2" v-for="township in getTownships" :key="township.id">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" :id="township.id" :value="township.id" v-model="townshipID" @change="getCheck($event)">
                  {{township.township_name}}
                </label>
              </div>
            </div>
          </div>

        <!-- <div class="col-sm-2 left-div-1">費用</div> -->
          <!-- <div class="col-sm-10">
            <hr>
            <table class="text-center" width="50%">
              <tbody>
                <tr>
                  <td>入居時</td>
                  <td>
                    <select class="form-control custom-select" name="" id="">
                      <option value="" selected="selected">下限なし</option>
                      <option value="0">0円</option>
                      <option value="500000">50万円</option>
                      <option value="1000000">100万円</option>
                      <option value="2000000">200万円</option>
                      <option value="3000000">300万円</option>
                      <option value="4000000">400万円</option>
                      <option value="5000000">500万円</option>
                      <option value="6000000">600万円</option>
                      <option value="7000000">700万円</option>
                      <option value="8000000">800万円</option>
                      <option value="9000000">900万円</option>
                      <option value="10000000">1,000万円</option>
                      <option value="20000000">2,000万円</option>
                      <option value="30000000">3,000万円</option>
                    </select>
                  </td>
                  <td>～</td>
                  <td>
                    <select class="form-control custom-select" name="" id="">
                      <option value="" selected="selected">上限なし</option>
                      <option value="0">0円</option>
                      <option value="500000">50万円</option>
                      <option value="1000000">100万円</option>
                      <option value="2000000">200万円</option>
                      <option value="3000000">300万円</option>
                      <option value="4000000">400万円</option>
                      <option value="5000000">500万円</option>
                      <option value="6000000">600万円</option>
                      <option value="7000000">700万円</option>
                      <option value="8000000">800万円</option>
                      <option value="9000000">900万円</option>
                      <option value="10000000">1,000万円</option>
                      <option value="20000000">2,000万円</option>
                      <option value="30000000">3,000万円</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>月額</td>
                  <td>
                    <select class="form-control custom-select" name="" id="">
                      <option value="" selected="selected">下限なし</option>
                      <option value="0">0円</option>
                      <option value="100000">10万円</option>
                      <option value="150000">15万円</option>
                      <option value="200000">20万円</option>
                      <option value="250000">25万円</option>
                      <option value="300000">30万円</option>
                      <option value="350000">35万円</option>
                      <option value="400000">40万円</option>
                      <option value="450000">45万円</option>
                      <option value="500000">50万円</option>
                    </select>
                  </td>
                  <td>～</td>
                  <td>
                    <select class="form-control custom-select" name="" id="">
                      <option value="" selected="selected">上限なし</option>
                      <option value="0">0円</option>
                      <option value="100000">10万円</option>
                      <option value="150000">15万円</option>
                      <option value="200000">20万円</option>
                      <option value="250000">25万円</option>
                      <option value="300000">30万円</option>
                      <option value="350000">35万円</option>
                      <option value="400000">40万円</option>
                      <option value="450000">45万円</option>
                      <option value="500000">50万円</option>
                    </select>
                  </td>
                </tr>
              </tbody>
            </table>
          </div> -->

          <div class="col-sm-2 left-div-1" v-if="showOne"> 入居時の条件</div>
          <div class="col-sm-10" v-if="showOne">
            <hr>
            <div class="row pl-3 pt-3" v-if="showOne">
              <div class="form-check form-check-inline col-sm-3" id="customCheck1">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox">
                  自立
                </label>
              </div>
              <div class="form-check form-check-inline col-sm-3" id="customCheck1">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox">
                  要支援
                </label>
              </div>
              <div class="form-check form-check-inline col-sm-3" id="customCheck1">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox">
                  要介護
                </label>
              </div>
            </div>
          </div>

          <div class="col-sm-2 left-div-1" v-if="showOne">特長</div>
          <div class="col-sm-10" v-if="showOne">
            <hr>
            <div class="form-check form-check-inline col-sm-2" v-for="features in special_features" :key="features.id">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" :id="features.id" :value="features.id" @click="features($event)">
                {{features.name}}
              </label>
            </div>
          </div>

          <div class="col-sm-2 left-div-1" v-if="showOne">施設の種類</div>
          <div class="col-sm-10" v-if="showOne">
            <hr>
            <div class="form-check form-check-inline col-sm-2" v-for="fac_type in fac_types" :key="fac_type.id">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" :id="fac_type.id" :value="fac_type.id">
                {{fac_type.description}}
              </label>
            </div>
          </div>

          <div class="col-sm-2 left-div-1" v-if="showOne">医療面・診療科目</div>
          <div class="col-sm-10 mb-4" v-if="showOne">
            <hr>
            <div class="form-check form-check-inline col-sm-2" v-for="medical in medical_acceptance" :key="medical.id">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" :id="medical.id" :value="medical.id">
                {{medical.name}}
              </label>
            </div>
          </div>

          <div class="col-sm-2 left-div-2"></div>
          <div class="col-sm-10">
            <button @click="showOne = !showOne" class="btn btn-link mt-2">
              <span v-show="showOne"><i class="fas fa-arrow-circle-up"></i> Close</span>
              <span v-show="!showOne"><i class="fas fa-arrow-circle-down"></i> Open</span>
            </button>
          </div>

            <div class="col-sm-6 left-div-6"></div>
            <div class="col-sm-6 m-b-20">
                <input type="button" value="Search" name="search" @click="search">
            </div>
        </div>

      </div>
      <!-- <div class="col-md-2 p-l-0">
        <asidebar></asidebar>
      </div>-->
    </div>

  </div>
</template>


<script>
  import asidebar from "./aside.vue";
  import {
    eventBus
  } from '../event-bus.js';
  import json from '../google-map-kml/converted.json';
  // import json from '../google-map-kml/jp_cities.json';
  export default {

    name: "mymap",
    components: {
      asidebar
    },

    data() {

      return {

        map: null,
        markers: [],
        selectedLocation: null,
        infoBoxOpen: false,
        places: [],
        id: [],
        townshipID: [],
        township_id: [],
        cities: '1',
        getCity: [],
        getTownships: [],
        special_features: [],
        fac_types: [],
        fac_id: [],
        medical_acceptance: [],
        show: false,
        showOne: true,
        checkarr: [],
        currentOffset: 0,
        windowSize: 3,
        paginationFactor: 410,
        nursingList: [],
        alphabet: []

      }
    },
    mounted() {

    },
    computed: {
      atEndOfList() {
        return this.currentOffset <= (this.paginationFactor * -1) * (this.nursingList.length - this.windowSize);
      },
      atHeadOfList() {
        return this.currentOffset === 0;
      },
    },
    methods: {
      search(){
        alert(this.id);
      },
      openInfoWindow(marker) {
        this.selectedLocation = marker;
        this.infoBoxOpen = true;
      },
      closeInfoWindow() {
        this.infoBoxOpen = false;
      },
      showSearchMap() {
        $('#searchMap').removeClass('select');
        $('#showSearchMap').addClass('select');
        $('#filter').addClass('select');

      },
      moveCarousel(direction) {

        // Find a more elegant way to express the :style. consider using props to make it truly generic
        if (direction === 1 && !this.atEndOfList) {
          this.currentOffset -= this.paginationFactor;
        } else if (direction === -1 && !this.atHeadOfList) {
          this.currentOffset += this.paginationFactor;
        }
      },
      getStateClick(e) {
       
        if (e.target.tagName === 'A' || e.target.tagName === 'path' || e.target.tagName === 'OPTION') {

          if(e.target.id == ''){
            var id = $('#selectCity').val();
          }else{
            var id = e.target.id;
          }
          this.axios.post('/api/getmap/' + id + '')
            .then((response) => {
              // console.log(response.data.nursing_profile)
              // $('#selectTownship').empty();
              $('.select').removeClass('select');
              $('#searchMap').addClass('select');
              $('#showSearchMap').removeClass('select');
              $('#filter').removeClass('select');
              this.cities = response.data.city
              this.getCity = response.data.getCity
              this.getTownships = response.data.getTownships
              this.special_features = response.data.special_features
              this.fac_types = response.data.fac_types
              this.medical_acceptance = response.data.medical_acceptance
              this.markers = response.data.nus_latlng;
              this.nursingList = response.data.nursing_profile
              this.id = id


              var mmarker = new Array();
              var item = [];
              for (var i = 0; i < this.markers.length; i++) {
                mmarker.push([this.markers[i]['business_entity'], this.markers[i]['lat'], this.markers[i]['lng']])
                item.push(this.markers[i])
              }

              const theCity = response.data.getCity[0]['city_eng']
              const lat = response.data.getCity[0]['latitude']
              const lng = response.data.getCity[0]['longitude']
              const result = json.features
              const coordinates = []
              for (var i = 0; i < result.length; i++) {
                if (result[i].Name == theCity) {
                  coordinates.push(result[i].geometry['coordinates'])
                }
                

              }

              var coordinate = coordinates.reduce((acc, val) => acc.concat(val), []);
              console.log(coordinates)
              var data = {
                type: "Feature",
                geometry: {
                  "type": "Polygon",
                  "coordinates": coordinate
                },

              };
              var mapProp = {
                center: new google.maps.LatLng(lat, lng),
                zoom: 6,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
              };

              var map = new google.maps.Map(document.getElementById("mymap"), mapProp);
              map.data.addGeoJson(data);
              map.data.setStyle({
                strokeColor: "red",
                fillColor: 'red',
                strokeOpacity: 0.8,
                fillOpacity: 0.1,
                strokeWeight: 1
              })

              var bounds = new google.maps.LatLngBounds();
              var markers = mmarker;
              var infoWindowContent = new Array();

              for (var i = 0; i < item.length; i++) {
                infoWindowContent.push([
                  '<div id="info_content">' +
                    '<div class="">' +
                      '<table class="table">' +
                        '<thead>' +
                          '<tr>' +
                            '<td class="text-left text-danger">' + item[i]['num_rooms'] +
                            '</td>' +
                            '<td class="text-right">' + item[i]['date_of_establishment'] +
                            '</td>' +
                          '</tr>' +
                        '</thead>' +
                        '<tbody>' +
                          '<tr>' +
                            '<td colspan="2"><button class="item-fav-infowindow"> <i class="fas fa-plus-square"></i> <span class="info-font"> 資料請求 . 見学リスト . 追加 </span> </button></td>' +
                          '</tr>' +
                          '<tr>' +
                          '<td colspan="2" class="text-left">' +
                            '<span class="item-name">' + item[i]['name'] + '</span> <br>' +
                            '<span>' + item[i]['city_name'] + ' <i class="fas fa-angle-double-right"></i> ' + item[i]['township_name'] + '</span>' +
                          '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td colspan="2" style="background: linear-gradient(135deg, rgba(255,151,76,1) 0%, rgba(255,92,10,0.59) 100%);">' +
                            item[i]['type_name'] +
                            +'</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<td>' +
                         '<img src="/images/' + item[i]['logo'] + '" alt="image" width="150px"/>' +
                        '</td>' +
                        '<td>' +
                          '<table class="table table-bordered">' +
                            '<tbody>' +
                              '<tr>' +
                                '<td>Address</td>' +
                                '<td>' + item[i]['address'] + '</td>' +
                              '</tr>' +
                            '<tr>' +
                              '<td>Phone</td>' +
                              '<td>' + item[i]['phone'] + '</td>' +
                              '</tr>' +
                            '<tr>' +
                            '<td>Website</td>' +
                            '<td><a href="http://'+item[i]['website']+'" target="_blank">'+item[i]['website']+'</a></td>' +
                            '</tr>' +
                            '</tbody>' +
                          '</table>' +
                        '</td>' +
                        '</tr>' +
                        ' <tr>' +
                        '<td colspan="2">' +
                          '<div class="row text-center">' +
                            '<div class="col-sm-6">' +
                              '<div class="moveing-in">Moving In</div>' +
                            '</div>' +
                            '<div class="col-sm-6">' +
                              '<div class="per-month">Per Month</div>' +
                            '</div>' +
                            '<div class="col-sm-6">' +
                              '<div class="moveing-in-item">' + item[i]['moving_in_to'] + '</div>' +
                            '</div>' +
                            '<div class="col-sm-6">' +
                              '<div class="per-month-item">' + item[i]['per_month_to'] + '</div>' +
                            '</div>' +
                          '</div>' +
                        '</td>' +
                        '</tr>' +
                        '</tbody>' +
                      '</table>' +
                    '</div>' +
                  '</div>'
                ])
              }

              var infoWindow = new google.maps.InfoWindow(),
                marker, i;
              const alphabet = response.data.alphabet;
              for (i = 0; i < this.markers.length; i++) {
                var k = alphabet[i];
                var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                bounds.extend(position);
                marker = new google.maps.Marker({
                  position: position,
                  map: map,
                  icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=' + k + '|FF0000|000000',
                  zoom: 6,

                  title: markers[i][0]
                });
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                  return function() {
                    infoWindow.setContent(infoWindowContent[i][0]);
                    infoWindow.open(map, marker);
                  }
                })(marker, i));
                google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
                  return function() {
                    marker.setAnimation(google.maps.Animation.BOUNCE);
                    setTimeout(function() {
                      marker.setAnimation(null);
                    }, 750);
                  }
                })(marker, i));
                var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
                  google.maps.event.removeListener(boundsListener);
                });
                // console.log($('#mapMarker'));
                $('#mapMarker').src = "http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=" + k + "|FF0000|000000' />";
                // console.log($('#mapMarker').src)

              }
            })
        } 
      },

      googleMarker(marker) {
        console.log(google.maps.Animation.BOUNCE)
      },
      getCheck(e) {
      
alert(this.id);
        if (this.townshipID.length > 0) {

          this.axios.post('/api/getmaptownship/' + this.townshipID + '')
            .then((response) => {
              this.markers = response.data;

              var mmarker = new Array();
              var multibusiness = new Array();
              for (var i = 0; i < this.markers.length; i++) {
                mmarker.push([this.markers[i]['business_entity'], this.markers[i]['lat'], this.markers[i]['lng']])
                multibusiness.push(this.markers[i]['business_entity'])
              }
              var icon = {
                url: "/google-map/marker-1.png", // url
                scaledSize: new google.maps.Size(30, 35), // scaled size
              };
              var mapProp = {
                // center: new google.maps.LatLng(lat, lng),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
              };
              var map = new google.maps.Map(document.getElementById("mymap"), mapProp);
              var bounds = new google.maps.LatLngBounds();
              var markers = mmarker;
              var infoWindowContent = new Array();
              for (var i = 0; i < multibusiness.length; i++) {
                infoWindowContent.push(['<div class="info_content">' + multibusiness[i] + '</div>'])
              }
              var infoWindow = new google.maps.InfoWindow(),
                marker, i;
              for (i = 0; i < this.markers.length; i++) {
                var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                bounds.extend(position);
                marker = new google.maps.Marker({
                  position: position,
                  map: map,
                  icon: icon,
                  zoom: 6,
                  title: markers[i][0]
                });
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                  return function() {
                    infoWindow.setContent(infoWindowContent[i][0]);
                    infoWindow.open(map, marker);
                  }
                })(marker, i));
                google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
                  return function() {
                    marker.setAnimation(google.maps.Animation.BOUNCE);
                    setTimeout(function() {
                      marker.setAnimation(null);
                    }, 750);
                  }
                })(marker, i));
                map.fitBounds(bounds);
                map.setZoom(11);
                var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
                  google.maps.event.removeListener(boundsListener);
                });
              }


            });
        } else {
          this.markers = '';
        }



      },
      features(e) {
        if (e.target.checked) {
          alert('1');
        }
      },
      getStateHover(e) {
        // if(e.target.tagName ==='AREA'){
        //  console.log(e)
        // }
      },
    }
  };
</script>

<style scoped>
  .path {
    cursor: pointer;
  }

  .selected {
    fill: #5c5959;
    stroke: #111;
    stroke-width: 2px;
    stroke-linejoin: round;
    color: #f27a24 !important;
    font-weight: bold;
  }

  .path {
    -moz-transition-property: opacity;
    -o-transition-property: opacity;
    -webkit-transition-property: opacity;
    transition-property: opacity;
    -moz-transition-duration: 0.5s;
    -o-transition-duration: 0.5s;
    -webkit-transition-duration: 0.5s;
    transition-duration: 0.5s;
    -moz-transition-timing-function: ease;
    -o-transition-timing-function: ease;
    -webkit-transition-timing-function: ease;
    transition-timing-function: ease;
    -moz-transition: fill 0.75s;
    -o-transition: fill 0.75s;
    -webkit-transition: fill 0.75s;
    transition: fill 0.75s;
  }

  .path:hover,
  .path:focus {
    cursor: pointer;
  }

  .path:hover,
  .path:hover .path,
  .path:focus,
  .path:focus .path {
    color: #000;
  }

  .path:hover,
  a:hover {
    fill: #20487c !important;
    stroke: #002868 !important;
    stroke-width: 2px;
    stroke-linejoin: round;
    cursor: pointer;
  }

  .select {
    display: none;
  }

  span.tooltip {
    padding: 0px 5px;
    position: relative;
    background: #ffbb99;
    cursor: pointer;
  }

  .tooltip-info {
    position: absolute;
    top: -9999px;
    left: -9999px;
  }

  span.tooltip::before {
    content: attr(data-tooltip);
    position: absolute;
    top: 1.5em;
    font-size: 0.9em;
    padding: 1px 5px;
    display: none;
    color: white;
    background: rgba(0, 0, 0, 0.75);
    border-radius: 4px;
    transition: opacity 0.1s ease-out;
    z-index: 99;
    text-align: left;
  }

  span:hover::before {
    display: inline-block;
  }

  [data-toggle="collapse"] .fa:before {
    content: "\f139";
  }

  [data-toggle="collapse"].collapsed .fa:before {
    content: "\f13a";
  }


  .left-div {
    text-align: end;
    padding: 10px 20px 10px 40px;
    border-radius: 5px 0px 0px;
    border-left: 10px solid brown;
  }

  .left-div-1 {
    text-align: end;
    padding: 10px 20px 10px 40px;
    border-left: 10px solid brown;
  }

  .left-div-2 {
    text-align: end;
    padding: 10px 20px 10px 40px;
    border-left: 10px solid brown;
    border-radius: 0px 0px 0px 5px;

  }

  .row-div {
    background: radial-gradient(ellipse at center, rgb(255, 240, 223) 0%, rgba(242, 234, 225, 0.58) 100%);
    border-radius: 5px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    border-radius: 10px;
  }

  .toBeToggled2 {
    display: block;
  }

  .toBeToggled1 {
    display: none;
  }

  .table th,
  .table td {
    border-top: none !important;
  }

  table>tbody>tr th {
    background-color: #e8e7e7;
    text-align: right;
    width: 140px;
    padding: 25px;
  }

  label {
    color: black !important;
  }

  .vue-map-container {
    height: 640px;
  }

  .infoWindow {}

  .justBlock {
    width: 100px;
    height: 100px;
    line-height: 100px;
    text-align: center;
    background-color: #bada55;
    color: darkgreen;
    font-family: sans-serif;
    /* &:hover {
    cursor:pointer;
  } */
  }

  #mymap {
    width: 100%;
    height: 700px;
  }
  /* #mymap {background: transparent url('/images/google/loading.jpg') no-repeat center center;} */
div#holder {
    position: relative;
}

.hidden {
    display: none;
}

div.overlay {
    position: absolute;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: #fff;
    opacity: 0.7;
    z-index: 1;
}

div.overlay.standard { background: #fff url('/images/google/loading.jpg') no-repeat 50% 50%; }

  .card_1 {
    display: inline-block;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, .15);
    margin: 20px;
    position: relative;
    /* margin-bottom: 50px; */
    transition: all .2s ease-in-out;
  }

  .card_1:hover {
    /*box-shadow: 0 5px 22px 0 rgba(0,0,0,.25);*/
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
    /* margin-bottom: 54px; */
  }

  .image {
    height: 200px;
    opacity: .7;
    overflow: hidden;
    transition: all .2s ease-in-out;
  }

  .image:hover,
  .card_1:hover .image {
    height: 200px;
    opacity: 1;
  }

  .text {
    background: #FFF;
    padding: 20px;
    min-height: 200px;
  }

  .text p {
    margin-bottom: 0px;
  }

  .fab {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    position: absolute;
    margin-top: -50px;
    right: 20px;
    box-shadow: 0px 2px 6px rgba(0, 0, 0, .3);
    color: #fff;
    font-size: 48px;
    line-height: 48px;
    text-align: center;
    background: #0066A2;
    -webkit-transition: -webkit-transform .2s ease-in-out;
    transition: transform .2s ease-in-out;
  }

  .fab:hover {
    background: #549D3C;
    cursor: pointer;
    -ms-transform: rotate(90deg);
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
  }


  #nrusing-search .card-carousel-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 20px 0 40px;
    color: #666a73;
  }

  #nrusing-search .card-carousel {
    display: flex;
    justify-content: center;
    width: 1359px;
  }

  #nrusing-search .card-carousel--overflow-container {
    overflow: hidden;
  }

  #nrusing-search .card-carousel--nav__left,
  #nrusing-search .card-carousel--nav__right {
    display: inline-block;
    width: 15px;
    height: 15px;
    padding: 10px;
    box-sizing: border-box;
    border-top: 2px solid #42b883;
    border-right: 2px solid #42b883;
    margin: 0 10px;
    transition: transform 150ms linear;
  }

  #nrusing-search .card-carousel--nav__left[disabled],
  #nrusing-search .card-carousel--nav__right[disabled] {
    opacity: 0.2;
    border-color: black;
  }

  #nrusing-search .card-carousel--nav__left {
    transform: rotate(-135deg);
  }

  #nrusing-search .card-carousel--nav__left:active {
    transform: rotate(-135deg) scale(0.9);
  }

  #nrusing-search .card-carousel--nav__right {
    transform: rotate(45deg);
  }

  #nrusing-search .card-carousel--nav__right:active {
    transform: rotate(45deg) scale(0.9);
  }

  #nrusing-search .card-carousel-cards {
    display: flex;
    transition: transform 150ms ease-out;
    transform: translatex(0px);
  }

  #nrusing-search .card-carousel-cards .card-carousel--card {
    margin: 0 10px;
    box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
    background-color: #fff;
    border-radius: 4px;
    z-index: 3;
    margin-bottom: 2px;
    transition: all 0.3s cubic-bezier(.25,.8,.25,1);
  }

  #nrusing-search .card-carousel-cards .card-carousel--card:hover {
    box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);

  }

  #nrusing-search .card-carousel-cards .card-carousel--card:first-child {
    margin-left: 0;
  }

  #nrusing-search .card-carousel-cards .card-carousel--card:last-child {
    margin-right: 0;
  }

  #nrusing-search .card-carousel-cards .card-carousel--card img {
    vertical-align: bottom;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    transition: opacity 150ms linear;
    user-select: none;
  }

  #nrusing-search .card-carousel-cards .card-carousel--card img:hover {
    opacity: 0.5;
  }

  #nrusing-search .card-carousel-cards .card-carousel--card--footer {
    border-top: 0;
    padding: 7px 15px;
  }

  #nrusing-search .card-carousel-cards .card-carousel--card--footer p {
    padding: 3px 0;
    margin: 0;
    margin-bottom: 2px;
    font-size: 19px;
    font-weight: 500;
    color: #2c3e50;
    user-select: none;
  }

  #nrusing-search .card-carousel-cards .card-carousel--card--footer p:nth-of-type(2) {
    font-size: 12px;
    font-weight: 300;
    padding: 6px;
    background: rgba(40, 44, 53, 0.06);
    display: inline-block;
    position: relative;
    margin-left: 4px;
    color: #666a73;
  }

  #nrusing-search .card-carousel-cards .card-carousel--card--footer p:nth-of-type(2):before {
    content: "";
    float: left;
    position: absolute;
    top: 0;
    left: -12px;
    width: 0;
    height: 0;
    border-color: transparent rgba(40, 44, 53, 0.06) transparent transparent;
    border-style: solid;
    border-width: 12px 12px 12px 0;
  }

 #nrusing-search .card-carousel-cards .card-carousel--card--footer p:nth-of-type(2):after {
    content: "";
    position: absolute;
    top: 10px;
    left: -1px;
    float: left;
    width: 4px;
    height: 4px;
    border-radius: 2px;
    background: white;
    box-shadow: -0px -0px 0px #004977;
  }
</style>
