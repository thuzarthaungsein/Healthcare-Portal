<template>
  <div class="search-map card-body" @click="getStateClick" @mouseover="getStateHover">
    <div class="row" id="hos">
      <div class="col-md-12">
        <div class="row">
          <div class="info-box"></div>
          <div class="col-sm-11 map-wrap">
            <div class="divisions">
              <div class="row">
                <div class="col-sm-2 hokkaido-box">
                  <div class="card mb-3">
                    <div class="card-header pad-10" style="background-color:#6699cc">北海道・東北</div>
                    <div class="card-body">
                      <p class="card-text map-text">
                        <span class="spanclass">
                          <a
                            href="#"
                            id="1"
                            data-info="Hokkaido"
                            class="path Hokkaido card-text"
                          >北海道</a>
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
                          <a
                            href="#"
                            id="6"
                            data-info="Yamagata"
                            class="path Yamagata card-text"
                          >山形県</a>
                        </span>
                        <span class="spanclass">
                          <a
                            href="#"
                            id="7"
                            data-info="Fukushima"
                            class="path Fukushima card-text"
                          >福島県</a>
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
                          <a
                            href="#"
                            id="11"
                            data-info="Saitama"
                            class="path Saitama card-text"
                          >埼玉県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="12" data-info="Chiba" class="path Chiba card-text">千葉県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="13" data-info="Tokyo" class="path Tokyo card-text">東京都</a>
                        </span>
                        <span class="spanclass">
                          <a
                            href="#"
                            id="14"
                            data-info="Kanagawa"
                            class="path Kanagawa card-text"
                          >神奈川県</a>
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
                          <a
                            href="#"
                            id="15"
                            data-info="Niigata"
                            class="path Niigata card-text"
                          >新潟県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="16" data-info="Toyama" class="path Toyama card-text">富山県</a>
                        </span>
                        <span class="spanclass">
                          <a
                            href="#"
                            id="17"
                            data-info="Ishikawa"
                            class="path Ishikawa card-text"
                          >石川県</a>
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
                          <a
                            href="#"
                            id="19"
                            data-info="Yamanashi"
                            class="path Yamanashi card-text"
                          >山梨県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="20" data-info="Nagano" class="path Nagano card-text">長野県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="21" data-info="Gifu" class="path Gifu card-text">岐阜県</a>
                        </span>
                        <span class="spanclass">
                          <a
                            href="#"
                            id="22"
                            data-info="Shizuoka"
                            class="path Shizuoka card-text"
                          >静岡県</a>
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
                          <a
                            href="#"
                            id="30"
                            data-info="Wakayama"
                            class="path Wakayama card-text"
                          >和歌山県</a>
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
                          <a
                            href="#"
                            id="31"
                            data-info="Tottori"
                            class="path Tottori card-text"
                          >鳥取県</a>
                        </span>
                        <span class="spanclass">
                          <a
                            href="#"
                            id="32"
                            data-info="Shimane"
                            class="path Shimane card-text"
                          >島根県</a>
                        </span>
                        <span class="spanclass">
                          <a
                            href="#"
                            id="33"
                            data-info="Okayama"
                            class="path Okayama card-text"
                          >岡山県</a>
                        </span>
                        <span class="spanclass">
                          <a
                            href="#"
                            id="34"
                            data-info="Hiroshima"
                            class="path Hiroshima card-text"
                          >広島県</a>
                        </span>
                        <span class="spanclass">
                          <a
                            href="#"
                            id="35"
                            data-info="Yamaguchi"
                            class="path Yamaguchi card-text"
                          >山口県</a>
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
                          <a
                            href="#"
                            id="36"
                            data-info="Tokushima"
                            class="path Tokushima card-text"
                          >徳島県</a>
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
                          <a
                            href="#"
                            id="40"
                            data-info="Fukuoka"
                            class="path Fukuoka card-text"
                          >福岡県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="41" data-info="Saga" class="path Saga card-text">佐賀県</a>
                        </span>
                        <span class="spanclass">
                          <a
                            href="#"
                            id="42"
                            data-info="Nagasaki"
                            class="path Nagasaki card-text"
                          >長崎県</a>
                        </span>
                        <span class="spanclass">
                          <a
                            href="#"
                            id="43"
                            data-info="Kumamoto"
                            class="path Kumamoto card-text"
                          >熊本県</a>
                        </span>
                        <span class="spanclass">
                          <a href="#" id="44" data-info="Oita" class="path Oita card-text">大分県</a>
                        </span>
                        <span class="spanclass">
                          <a
                            href="#"
                            id="45"
                            data-info="Miyazaki"
                            class="path Miyazaki card-text"
                          >宮崎県</a>
                        </span>
                        <span class="spanclass">
                          <a
                            href="#"
                            id="46"
                            data-info="Kagoshima"
                            class="path Kagoshima card-text"
                          >鹿児島県</a>
                        </span>
                        <span class="spanclass">
                          <a
                            href="#"
                            id="47"
                            data-info="Okinawa"
                            class="path Okinawa card-text"
                          >沖縄県</a>
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="map">
              <svg
                class="map_svg"
                viewBox="88 220 400 420"
                preserveAspectRatio="xMidYMid meet"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                mapsvg:geoViewBox="123.658963 45.523885 145.820743 24.217586"
                width="100%"
                height="730"
                
              >
                <path
                  id="1"
                  data-info="Hokkaido"
                  title="Hokkaido"
                  class="path Hokkaido"
                  stroke="#333333"
                  fill="#6699cc"
                  d="M378.27,247.63h86.97v55.8h-62.62l0.09,8.05h-24.44V247.63z"
                />
                <path
                  data-v-6121795b
                  id="2"
                  data-info="Aomori"
                  title="Aomori"
                  stroke="#333333"
                  fill="#6699cc"
                  d="M377.33,317.77h65.18v21.09h-65.18V317.77z"
                  class="path Aomori"
                />
                <path
                  data-v-6121795b
                  id="3"
                  data-info="Iwate"
                  title="Iwate"
                  stroke="#333333"
                  fill="#6699cc"
                  d="M377.33,338.86h32.59v23.24h-32.59V338.86z"
                  class="path Iwate"
                />
                <path
                  data-v-6121795b
                  id="4"
                  data-info="Miyagi"
                  title="Miyagi"
                  stroke="#333333"
                  fill="#6699cc"
                  d="M409.92,338.86h32.59v23.24h-32.59V338.86z"
                  class="path Miyagi"
                />
                <path
                  data-v-6121795b
                  id="5"
                  data-info="Akita"
                  title="Akita"
                  stroke="#333333"
                  fill="#6699cc"
                  d="M377.33,362.11h32.59v24.01h-19.39l-0.13-8.34l-13.07-0.13V362.11z"
                  class="path Akita"
                />
                <path
                  data-v-5cde3559
                  id="6"
                  data-info="Yamagata"
                  title="Yamagata"
                  stroke="#333333"
                  fill="#6699cc"
                  d="M442.51,362.11v24.01h-32.59v-24.01H442.51z"
                  class="path Yamagata"
                />
                <path
                  data-v-5cde3559
                  id="7"
                  data-info="Fukushima"
                  title="Fukushima"
                  stroke="#333333"
                  fill="#6699cc"
                  d="M390.53,386.12h51.98v23.62h-52.48L390.53,386.12z"
                  class="path Fukushima"
                />
                <path
                  data-v-5cde3559
                  id="8"
                  data-info="Ibaraki"
                  title="Ibaraki"
                  stroke="#333333"
                  fill="#71d5cb"
                  d="M426.21,440.8l-0.51-31.06h16.8v31.06H426.21z"
                  class="path Ibaraki"
                />
                <path
                  data-v-5cde3559
                  id="9"
                  data-info="Tochigi"
                  title="Tochigi"
                  stroke="#333333"
                  fill="#71d5cb"
                  d="M401.96,409.74h23.75v23.36h-23.75V409.74z"
                  class="path Tochigi"
                />
                <path
                  data-v-5cde3559
                  id="10"
                  data-info="Gunma"
                  title="Gunma"
                  stroke="#333333"
                  fill="#71d5cb"
                  d="M378.46,409.74h23.49v23.36h-23.49V409.74z"
                  class="path Gunma"
                />
                <path
                  data-v-5cde3559
                  id="11"
                  data-info="Saitama"
                  title="Saitama"
                  stroke="#333333"
                  fill="#71d5cb"
                  d="M425.71,433.09v19.45h-47.24v-19.45H425.71z"
                  class="path Saitama"
                />
                <path
                  data-v-5cde3559
                  id="12"
                  data-info="Chiba"
                  title="Chiba"
                  stroke="#333333"
                  fill="#71d5cb"
                  d="M426.21,440.8h16.29v56.21c0,0-16.04,1.26-16.29,0C425.96,495.75,426.21,440.8,426.21,440.8z"
                  class="path Chiba"
                />
                <path
                  data-v-5cde3559
                  id="13"
                  data-info="Tokyo"
                  title="Tokyo"
                  stroke="#333333"
                  fill="#71d5cb"
                  d="M390.02,453.18l35.68-0.63v13.77h-10.86l0.13,6.57h-24.76L390.02,453.18z"
                  class="path Tokyo"
                />
                <path
                  data-v-5cde3559
                  id="14"
                  data-info="Kanagawa"
                  title="Kanagawa"
                  stroke="#333333"
                  fill="#71d5cb"
                  d="M378.46,472.88h36.51v24.69l-24.95-0.44v-12.63l-11.56,0.13V472.88z"
                  class="path Kanagawa"
                />
                <path
                  data-v-5cde3559
                  id="15"
                  data-info="Niigata"
                  title="Niigata"
                  stroke="#333333"
                  fill="#75b777"
                  d="M377.33,377.65l13.07,0.13l-0.38,31.96h-31.26v-24.83h18.32L377.33,377.65z"
                  class="path Niigata"
                />
                <path
                  data-v-5cde3559
                  id="16"
                  data-info="Toyama"
                  title="Toyama"
                  stroke="#333333"
                  fill="#75b777"
                  d="M335.07,384.91h23.68v24.83h-23.68V384.91z"
                  class="path Toyama"
                />
                <path
                  data-v-5cde3559
                  id="17"
                  data-info="Ishikawa"
                  title="Ishikawa"
                  stroke="#333333"
                  fill="#75b777"
                  d="M318.59,377.65h16.48v32.08h-16.48V377.65z"
                  class="path Ishikawa"
                />
                <path
                  data-v-5cde3559
                  id="18"
                  data-info="Fukui"
                  title="Fukui"
                  stroke="#333333"
                  fill="#75b777"
                  d="M303.05,416.93h15.54v-7.19h16.48v23.36c0,0-32.02,0.44-32.02,0S303.05,416.93,303.05,416.93z"
                  class="path Fukui"
                />
                <path
                  data-v-5cde3559
                  id="19"
                  data-info="Yamanashi"
                  title="Yamanashi"
                  stroke="#333333"
                  fill="#c0c743"
                  d="M366.72,472.06v-19.52l23.31,0.63v18.88H366.72z"
                  class="path Yamanashi"
                />
                <path
                  data-v-5cde3559
                  id="20"
                  data-info="Nagano"
                  title="Nagano"
                  stroke="#333333"
                  fill="#c0c743"
                  d="M350.8,409.74h27.66v42.81h-11.75v19.52H350.8V409.74z"
                  class="path Nagano"
                />
                <path
                  data-v-5cde3559
                  id="21"
                  data-info="Gifu"
                  title="Gifu"
                  stroke="#333333"
                  fill="#c0c743"
                  d="M335.07,409.74h15.73v62.33h-15.73V409.74z"
                  class="path Gifu"
                />
                <path
                  data-v-5cde3559
                  id="22"
                  data-info="Shizuoka"
                  title="Shizuoka"
                  stroke="#333333"
                  fill="#c0c743"
                  d="M358.76,472.88h19.71v11.75l11.56-0.13v12.63l-31.26-0.82V472.88z"
                  class="path Shizuoka"
                />
                <path
                  data-v-5cde3559
                  id="23"
                  data-info="Aichi"
                  title="Aichi"
                  stroke="#333333"
                  fill="#c0c743"
                  d="M335.07,472.06l23.68,0.82v23.43h-23.68V472.06z"
                  class="path Aichi"
                />
                <path
                  data-v-5cde3559
                  id="24"
                  data-info="Mie"
                  title="Mie"
                  stroke="#333333"
                  fill="#efb838"
                  d="M319.06,456.97h16.01l1.07,55.07h-17.08V456.97z"
                  class="path Mie"
                />
                <path
                  data-v-5cde3559
                  id="25"
                  data-info="Shiga"
                  title="Shiga"
                  stroke="#333333"
                  fill="#efb838"
                  d="M319.06,433.29l16.01-0.2v23.87h-16.01V433.29z"
                  class="path Shiga"
                />
                <path
                  data-v-5cde3559
                  id="26"
                  data-info="Kyoto"
                  title="Kyoto"
                  stroke="#333333"
                  fill="#efb838"
                  d="M287.89,417.05l15.16-0.13v16.17l16.01,0.2v23.68h-31.17V417.05z"
                  class="path Kyoto"
                />
                <path
                  data-v-5cde3559
                  id="27"
                  data-info="Osaka"
                  title="Osaka"
                  stroke="#333333"
                  fill="#efb838"
                  d="M287.89,484.19v-27.22h15.58v27.22H287.89z"
                  class="path Osaka"
                />
                <path
                  data-v-5cde3559
                  id="28"
                  data-info="Hyogo"
                  title="Hyogo"
                  stroke="#333333"
                  fill="#efb838"
                  d="M271.73,416.93l16.17,0.13v48h-16.17V416.93z"
                  class="path Hyogo"
                />
                <path
                  data-v-5cde3559
                  id="29"
                  data-info="Nara"
                  title="Nara"
                  stroke="#333333"
                  fill="#efb838"
                  d="M303.48,456.97h15.58v39.35h-16.01L303.48,456.97z"
                  class="path Nara"
                />
                <path
                  data-v-5cde3559
                  id="309"
                  data-info="Wakayama"
                  title="Wakayama"
                  stroke="#333333"
                  fill="#efb838"
                  d="M303.48,484.19l-0.43,12.13h16.01v15.73h-31.17v-27.85H303.48zz"
                  class="path Wakayama"
                />
                <path
                  data-v-5cde3559
                  id="31"
                  data-info="Tottori"
                  title="Tottori"
                  stroke="#333333"
                  fill="#f58c3f"
                  d="M256.32,416.93h15.41v24.06l-15.41-0.19V416.93z"
                  class="path Tottori"
                />
                <path
                  data-v-5cde3559
                  id="32"
                  data-info="Shimane"
                  title="Shimane"
                  stroke="#333333"
                  fill="#f58c3f"
                  d="M240.65,416.93h15.66v23.87l-15.66,0.19V416.93zz"
                  class="path Shimane"
                />
                <path
                  data-v-5cde3559
                  id="33"
                  data-info="Okayama"
                  title="Okayama"
                  stroke="#333333"
                  fill="#f58c3f"
                  d="M256.32,465.05V440.8l15.41,0.19v24.06H256.32z"
                  class="path Okayama"
                />
                <path
                  data-v-5cde3559
                  id="34"
                  data-info="Hiroshima"
                  title="Hiroshima"
                  stroke="#333333"
                  fill="#f58c3f"
                  d="M240.65,440.99l15.66-0.19v24.25h-15.66V440.99z"
                  class="path Hiroshima"
                />
                <path
                  data-v-5cde3559
                  id="35"
                  data-info="Yamaguchi"
                  title="Yamaguchi"
                  stroke="#333333"
                  fill="#f58c3f"
                  d="M224.23,416.93h16.42v48.13h-16.42V416.93z"
                  class="path Yamaguchi"
                />
                <path
                  data-v-5cde3559
                  id="36"
                  data-info="Tokushima"
                  title="Tokushima"
                  stroke="#333333"
                  fill="#f1a296"
                  d="M279.81,492.59h-27.54v-20.53h27.54V492.59z"
                  class="path Tokushima"
                />
                <path
                  data-v-5cde3559
                  id="37"
                  data-info="Kagawa"
                  title="Kagawa"
                  stroke="#333333"
                  fill="#f1a296"
                  d="M224.23,472.06h28.04v20.53h-28.04V472.06z"
                  class="path Kagawa"
                />
                <path
                  data-v-5cde3559
                  id="38"
                  data-info="Ehime"
                  title="Ehime"
                  stroke="#333333"
                  fill="#f1a296"
                  d="M224.23,512.04v-19.45h28.04v19.45H224.23z"
                  class="path Ehime"
                />
                <path
                  data-v-5cde3559
                  id="39"
                  data-info="Kochi"
                  title="Kochi"
                  stroke="#333333"
                  fill="#f1a296"
                  d="M279.81,512.04h-27.54v-19.45h27.54V512.04z"
                  class="path Kochi"
                />
                <path
                  data-v-5cde3559
                  id="40"
                  data-info="Fukuoka"
                  title="Fukuoka"
                  stroke="#333333"
                  fill="#e77a72"
                  d="M162.08,416.93h16.17l-1.26,36l-14.91-0.38V416.93z"
                  class="path Fukuoka"
                />
                <path
                  data-v-5cde3559
                  id="41"
                  data-info="Saga"
                  title="Saga"
                  stroke="#333333"
                  fill="#e77a72"
                  d="M145,416.93h17.08v35.62L145,452.93V416.93z"
                  class="path Saga"
                />
                <path
                  data-v-5cde3559
                  id="42"
                  data-info="Nagasaki"
                  title="Nagasaki"
                  stroke="#333333"
                  fill="#e77a72"
                  d="M177.75,452.55v-35.62h39.66v16.17h-16.17v19.45H177.75z"
                  class="path Nagasaki"
                />
                <path
                  data-v-5cde3559
                  id="43"
                  data-info="Kumamoto"
                  title="Kumamoto"
                  stroke="#333333"
                  fill="#e77a72"
                  d="M217.41,460.76h-16.17v-27.66h16.17V460.76z"
                  class="path Kumamoto"
                />
                <path
                  data-v-5cde3559
                  id="44"
                  data-info="Oita"
                  title="Oita"
                  stroke="#333333"
                  fill="#e77a72"
                  d="M217.41,488.04h-16.17v-27.28h16.17V488.04z"
                  class="path Oita"
                />
                <path
                  data-v-5cde3559
                  id="45"
                  data-info="Miyazaki"
                  title="Miyazaki"
                  stroke="#333333"
                  fill="#e77a72"
                  d="M177.75,452.55h23.49v35.49h-23.49V452.55z"
                  class="path Miyazaki"
                />
                <path
                  data-v-5cde3559
                  id="46"
                  data-info="Kagoshima"
                  title="Kagoshima"
                  stroke="#333333"
                  fill="#e77a72"
                  d="M177.75,488.04h39.66v24h-39.66V488.04z"
                  class="path Kagoshima"
                />
                <path
                  data-v-5cde3559
                  id="47"
                  data-info="Okinawa"
                  title="Okinawa"
                  stroke="#333333"
                  fill="#e77a72"
                  d="M176.99,519.62h16.8V544h-16.8V519.62z"
                  class="path Okinawa"
                />
                <path
                  stroke="#333333"
                  fill="none"
                  stroke-width="1.8px"
                  d="M224.23,416.93h94.36v-39.27h16.48v7.25h42l0.25-67.14h65.18v179.24h-16.29l-0.51-30.69h-10.86l-0.05,30.82l-78.94-0.34l-0.07,15.25h-48.27l-0.19-46.42l-63.09-0.57V416.93z"
                />
                <path
                  stroke="#333333"
                  fill="none"
                  stroke-width="1.8px"
                  d="M224.23,472.06h55.58v39.98h-55.58V472.06z"
                />
                <path
                  stroke="#333333"
                  fill="none"
                  stroke-width="1.8px"
                  d="M145,416.93h72.41v95.12h-39.66v-58.61L145,452.93V416.93z"
                />
                <path
                  stroke="#333333"
                  fill="none"
                  stroke-width="1.8px"
                  d="M176.99,519.62h16.8V544h-16.8V519.62z"
                />
                <path
                  stroke="#333333"
                  fill="none"
                  stroke-width="1.8px"
                  d="M378.27,248.11l86.97-0.47v55.8h-62.62l-0.19,8.05h-24.16V248.11z"
                />
              </svg>
            </div>
          </div>
              
          
            <table class="table card-2 col-10 select">
              <tbody>
                <tr>
                  <th>地域</th>
                  <td>
                    <select  id="select" class="form-control col-3 custom-select mt-2" v-model="id">
                      <option v-for = "city in cities" :value="city.id" :key="city.id">{{city.city_name}}</option>
                    </select>
                    <button @click="toggleContent2" class="btn btn-link"  >
                      <i class="fa" aria-hidden="true"></i>
                          <!-- <em>{{city.city_name}}</em> -->
                          <span id="close3"><i class="fas fa-arrow-circle-up"></i> Close Township</span>
                    </button>
                   
                    <div  class="toBeToggled2" id="toBeToggled2">

                      <div class="form-check form-check-inline col-sm-2"   v-for="township in getTownships" :key="township.id">
                        <label class="form-check-label" :for="township.id">
                        <input class="form-check-input" type="checkbox" :id="township.id" :value="township.id" v-model="townshipID" @change="getCheck($event)"> 
                        {{township.township_name}}
                        </label>
                      </div>

                    </div>
                  </td>
                </tr>
                <tr>
                  <th>
                    費用
                  </th>
                  <td>
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
                  </td>
                </tr>

                <tr class="toBeToggled1 ShowHide">
                  <th>
                  入居時の条件
                  </th>
                  <td>
                    <div  class="row pl-3 pt-3">

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
                  </td>
                </tr>
                <tr class="toBeToggled1 ShowHide">
                  <th>特長</th>
                  <td>
                      <div class="form-check form-check-inline col-sm-2"  v-for="features in special_features" :key="features.id">
                        <label class="form-check-label" :for="features.id">
                        <input class="form-check-input" type="checkbox" :id="features.id" :value="features.id" @click="features($event)"> 
                        {{features.name}}
                        </label>
                      </div>

                  </td>
                </tr>
                <tr class="toBeToggled1 ShowHide">
                  <th>施設の種類</th>
                  <td>
                  <div class="form-check form-check-inline col-sm-2"  v-for="fac_type in fac_types" :key="fac_type.id">
                    <label class="form-check-label" :for="fac_type.id">
                    <input class="form-check-input" type="checkbox" :id="fac_type.id" :value="fac_type.id"> 
                     {{fac_type.description}}
                    </label>
                  </div>

                  </td>
                </tr>
                <tr class="toBeToggled1 ShowHide">
                  <th>医療面・診療科目</th>
                  <td>
                      <div class="form-check form-check-inline col-sm-2"  v-for="medical in medical_acceptance" :key="medical.id">
                        <label class="form-check-label" :for="medical.id">
                        <input class="form-check-input" type="checkbox" :id="medical.id" :value="medical.id" > 
                          {{medical.name}}
                        </label>
                      </div>
                  </td>
                </tr>
                <tr class="text-center">
                  <td colspan='2'>
                    <button @click="ShowHide" class="btn btn-link">
                      <i class="fa" aria-hidden="true"></i>
                          <span id="close1"><i class="fas fa-arrow-circle-down"></i> もっと見る</span>
                    </button>
                  </td>
                </tr>
                <tr class="text-center">
                  <td colspan="2">
                    <input type="button" id="save_value" name="save_value" value="Save" />
                  </td>
                </tr>
              </tbody>
            </table>
         
        </div>
         
          <div class="row">
            <div class="col-sm-12 col-md-12">
            <div class="card">
              <div class="card-body">
               
                  <GmapMap  id="googlemap"
                            ref="map"
                            :center="center"
                            :zoom="10" 
                            style="height:700px">
                            
                    <GmapMarker
                      v-for="(marker, index) in markers"
                      :key="index"
                      :position="marker"
                      :clickable="true"
                      :draggable="false"
                      @click="center=marker"
                      @mouseover="googleMarker"
                    />

                  </GmapMap>

                  
              </div>
            </div>
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
export default {
    name: "GoogleMap",
    components: {
      asidebar
    },
    data(){
      return{
        // markers: [
        //     { position: { lat: 0, lng: 0 } },
        // ],
        markers: [],
              
              // {lat:35.6432027,lng:139.6729435},
              // {lat:35.5279833,lng:139.6989209},
              // {lat:35.6563623,lng:139.7215211},
              // {lat:35.6167531,lng:139.5469376},
              // {lat:35.6950961,lng:139.5037899}
      
        places: [],
        center: { lat: 35.6432027, lng: 139.6729435 },
        id:'',    
        townshipID:[],
        township_id:[],
        cities:[],
        getCity:[],
        getTownships:[],
        special_features:[], 
        fac_types:[],
        fac_id:[],      
        medical_acceptance:[],
        toggleCheck: true,
        toggleCheck_1: false,
        checkarr:[]
     
      }
    },
    
  methods:{
    toggleContent2() {
      
        this.toggleCheck = !this.toggleCheck;
            if (this.toggleCheck == true) {
                $('#close3').empty();
                $("#toBeToggled2").slideDown();
                $('#close3').append('<i class="fas fa-arrow-circle-up"></i> Close Township');

            } else {
                $('#close3').empty();
                $("#toBeToggled2").slideUp();
                $('#close3').append('<i class="fas fa-arrow-circle-down"></i> Open Township');
            }
        },
        ShowHide() {
        this.toggleCheck_1 = !this.toggleCheck_1;
            if (this.toggleCheck_1 == true) {
                $('#close1').empty();
                $(".ShowHide").slideDown();
                $('#close1').append('<i class="fas fa-arrow-circle-up"></i> close');
              
            } else {
                $('#close1').empty();
                $(".ShowHide").slideUp();
                $('#close1').append('<i class="fas fa-arrow-circle-down"></i> もっと見る');
            }
        },
      getStateClick(e){
 
      
          if(e.target.tagName === 'A' || e.target.tagName ==='path'){

          const id = e.target.id;
          this.axios.post('/api/getmap/'+id+'')
          .then((response)=>{
            //console.log(response.data.getCity[0]['latitude'])
          $('.select').removeClass('select');
          this.cities = response.data.city
          this.getCity = response.data.getCity
          this.getTownships = response.data.getTownships
          this.special_features= response.data.special_features
          this.fac_types= response.data.fac_types
          this.medical_acceptance= response.data.medical_acceptance 
          this.markers = response.data.nus_latlng;
          this.id = id
         })
        }else if(e.target.tagName ==='OPTION'){
          const id = this.id;
          this.axios.post('/api/getmap/'+id+'')
          .then((response)=>{
          $('.select').removeClass('select');
          this.cities = response.data.city
          this.getCity = response.data.getCity
          this.getTownships = response.data.getTownships
          this.special_features= response.data.special_features
          this.fac_types= response.data.fac_types
          this.medical_acceptance= response.data.medical_acceptance
          this.markers = response.data.nus_latlng;
          this.id = id
         })
        }
      },
      googleMarker(e){
        console.log(e)
      },
        getCheck(e){
      
        // if(e.target.checked){
          
           if(this.townshipID.length>0)
           {
            
              this.axios.post('/api/getmaptownship/'+this.townshipID+'')
              .then((response)=>{
                this.markers = response.data;
                
           });
         }
         else{
           this.markers = '';
         }
          
        
       
      },
      features(e){
        if(e.target.checked){
          alert('1');
        }
      },
      getStateHover(e){
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


.card-2 {
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  border-radius:10px;
}
.toBeToggled2 {
    display: block;
}

.toBeToggled1 {
    display: none;
}
table{
  border-top:none !important;
}
table > tbody > tr th{
  background-color: #e8e7e7;
  text-align:right;
  width:140px;
  padding:25px;
}

</style>