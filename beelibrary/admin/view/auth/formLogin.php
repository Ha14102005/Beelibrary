<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Đăng nhập admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./assets/dist/css/adminlte.min.css?v=3.2.0">
  <script data-cfasync="false" nonce="17e6d72d-205a-4926-b66b-646c1330af2d">
    try {
      (function(w, d) {
        ! function(j, k, l, m) {
          if (j.zaraz) console.error("zaraz is loaded twice");
          else {
            j[l] = j[l] || {};
            j[l].executed = [];
            j.zaraz = {
              deferred: [],
              listeners: []
            };
            j.zaraz._v = "5828";
            j.zaraz._n = "17e6d72d-205a-4926-b66b-646c1330af2d";
            j.zaraz.q = [];
            j.zaraz._f = function(n) {
              return async function() {
                var o = Array.prototype.slice.call(arguments);
                j.zaraz.q.push({
                  m: n,
                  a: o
                })
              }
            };
            for (const p of ["track", "set", "debug"]) j.zaraz[p] = j.zaraz._f(p);
            j.zaraz.init = () => {
              var q = k.getElementsByTagName(m)[0],
                r = k.createElement(m),
                s = k.getElementsByTagName("title")[0];
              s && (j[l].t = k.getElementsByTagName("title")[0].text);
              j[l].x = Math.random();
              j[l].w = j.screen.width;
              j[l].h = j.screen.height;
              j[l].j = j.innerHeight;
              j[l].e = j.innerWidth;
              j[l].l = j.location.href;
              j[l].r = k.referrer;
              j[l].k = j.screen.colorDepth;
              j[l].n = k.characterSet;
              j[l].o = (new Date).getTimezoneOffset();
              if (j.dataLayer)
                for (const t of Object.entries(Object.entries(dataLayer).reduce(((u, v) => ({
                    ...u[1],
                    ...v[1]
                  })), {}))) zaraz.set(t[0], t[1], {
                  scope: "page"
                });
              j[l].q = [];
              for (; j.zaraz.q.length;) {
                const w = j.zaraz.q.shift();
                j[l].q.push(w)
              }
              r.defer = !0;
              for (const x of [localStorage, sessionStorage]) Object.keys(x || {}).filter((z => z.startsWith("_zaraz_"))).forEach((y => {
                try {
                  j[l]["z_" + y.slice(7)] = JSON.parse(x.getItem(y))
                } catch {
                  j[l]["z_" + y.slice(7)] = x.getItem(y)
                }
              }));
              r.referrerPolicy = "origin";
              r.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(j[l])));
              q.parentNode.insertBefore(r, q)
            };
            ["complete", "interactive"].includes(k.readyState) ? zaraz.init() : j.addEventListener("DOMContentLoaded", zaraz.init)
          }
        }(w, d, "zarazData", "script");
        window.zaraz._p = async mY => new Promise((mZ => {
          if (mY) {
            mY.e && mY.e.forEach((m$ => {
              try {
                const na = d.querySelector("script[nonce]"),
                  nb = na?.nonce || na?.getAttribute("nonce"),
                  nc = d.createElement("script");
                nb && (nc.nonce = nb);
                nc.innerHTML = m$;
                nc.onload = () => {
                  d.head.removeChild(nc)
                };
                d.head.appendChild(nc)
              } catch (nd) {
                console.error(`Error executing script: ${m$}\n`, nd)
              }
            }));
            Promise.allSettled((mY.f || []).map((ne => fetch(ne[0], ne[1]))))
          }
          mZ()
        }));
        zaraz._p({
          "e": ["(function(w,d){})(window,document)"]
        });
      })(window, document)
    } catch (e) {
      throw fetch("/cdn-cgi/zaraz/t"), e;
    };
  </script>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="" class="h1">Mời đăng nhập</a>
      </div>
      <div class="card-body">
      <?php if (isset($_SESSION['error'])){?>
      <p class="text-danger"><?= $_SESSION['error'] ?></p>
      <?php }else{ ?>
        <p class="login-box-msg">Vui long dang nhap</p>
      <?php } ?>


        <form action="<?= BASE_URL_ADMIN .'?act=check-login-admin' ?>" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
            <!-- /.col --><div class="col-12">
                <a href="http://localhost/WEB3014-PHP2/ASM1/admin/?act=list-product" class="btn btn-primary btn-block">
                    Đăng nhập
                </a>
            </div>

            <!-- /.col -->
          </div>
        </form>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="./assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="./assets//dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>