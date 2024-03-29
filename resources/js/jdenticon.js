// Jdenticon 2.2.0 | jdenticon.com | MIT licensed | (c) 2014-2019 Daniel Mester Pirttijärvi
(function (v, E) {
    var A = E(v, v && v.jQuery);
    "undefined" !== typeof module && "exports" in module ? module.exports = A : "function" === typeof define && define.amd ? define([], function () {
        return A
    }) : v.jdenticon = A
})("undefined" !== typeof self ? self : this, function (v, E) {
    function A(a, b, c) {
        for (var d = document.createElementNS("http://www.w3.org/2000/svg", b), f = 2; f + 1 < arguments.length; f += 2) d.setAttribute(arguments[f], arguments[f + 1]);
        a.appendChild(d)
    }

    function P(a) {
        this.b = Math.min(Number(a.getAttribute("width")) || 100, Number(a.getAttribute("height")) ||
            100);
        for (this.a = a; a.firstChild;) a.removeChild(a.firstChild);
        a.setAttribute("viewBox", "0 0 " + this.b + " " + this.b);
        a.setAttribute("preserveAspectRatio", "xMidYMid meet")
    }

    function Q(a) {
        this.b = a;
        this.a = '<svg xmlns="http://www.w3.org/2000/svg" width="' + a + '" height="' + a + '" viewBox="0 0 ' + a + " " + a + '" preserveAspectRatio="xMidYMid meet">'
    }

    function T(a) {
        "undefined" != typeof MutationObserver && (new MutationObserver(function (b) {
            for (var c = 0; c < b.length; c++) {
                for (var d = b[c], f = d.addedNodes, e = 0; f && e < f.length; e++) {
                    var h =
                        f[e];
                    if (1 == h.nodeType) if (m.B(h)) a(h); else {
                        h = h.querySelectorAll(m.C);
                        for (var l = 0; l < h.length; l++) a(h[l])
                    }
                }
                "attributes" == d.type && m.B(d.target) && a(d.target)
            }
        })).observe(document.body, {
            childList: !0,
            attributes: !0,
            attributeFilter: [m.o, m.v, "width", "height"],
            subtree: !0
        })
    }

    function t(a, b, c) {
        return parseInt(a.substr(b, c), 16)
    }

    function x(a) {
        return (10 * a + .5 | 0) / 10
    }

    function R() {
        this.j = ""
    }

    function H(a) {
        this.b = {};
        this.h = a;
        this.a = a.b
    }

    function I(a, b) {
        var c = a.canvas.width, d = a.canvas.height;
        a.save();
        this.b = a;
        b ? this.a = b :
            (this.a = Math.min(c, d), a.translate((c - this.a) / 2 | 0, (d - this.a) / 2 | 0));
        a.clearRect(0, 0, this.a, this.a)
    }

    function S(a) {
        this.h = a;
        this.c = B.a
    }

    function U(a, b) {
        a = b.R(a);
        return [w.i(a, b.J, b.I(0)), w.i(a, b.A, b.w(.5)), w.i(a, b.J, b.I(1)), w.i(a, b.A, b.w(1)), w.i(a, b.A, b.w(0))]
    }

    function V(a) {
        return function (b) {
            for (var c = [], d = 0; d < b.length; d++) for (var f = b[d], e = 28; 0 <= e; e -= 4) c.push((f >>> e & 15).toString(16));
            return c.join("")
        }(function (b) {
            for (var c = 1732584193, d = 4023233417, f = 2562383102, e = 271733878, h = 3285377520, l = [c, d, f, e, h], q =
                0; q < b.length; q++) {
                for (var n = b[q], g = 16; 80 > g; g++) {
                    var k = n[g - 3] ^ n[g - 8] ^ n[g - 14] ^ n[g - 16];
                    n[g] = k << 1 | k >>> 31
                }
                for (g = 0; 80 > g; g++) k = (c << 5 | c >>> 27) + (20 > g ? (d & f ^ ~d & e) + 1518500249 : 40 > g ? (d ^ f ^ e) + 1859775393 : 60 > g ? (d & f ^ d & e ^ f & e) + 2400959708 : (d ^ f ^ e) + 3395469782) + h + n[g], h = e, e = f, f = d << 30 | d >>> 2, d = c, c = k | 0;
                l[0] = c = l[0] + c | 0;
                l[1] = d = l[1] + d | 0;
                l[2] = f = l[2] + f | 0;
                l[3] = e = l[3] + e | 0;
                l[4] = h = l[4] + h | 0
            }
            return l
        }(function (b) {
            function c(q, n) {
                for (var g = [], k = -1, p = 0; p < n; p++) k = p / 4 | 0, g[k] = (g[k] || 0) + (f[q + p] << 8 * (3 - (p & 3)));
                for (; 16 > ++k;) g[k] = 0;
                return g
            }

            var d =
                encodeURI(b), f = [];
            b = 0;
            var e, h = [];
            for (e = 0; e < d.length; e++) {
                if ("%" == d[e]) {
                    var l = t(d, e + 1, 2);
                    e += 2
                } else l = d.charCodeAt(e);
                f[b++] = l
            }
            f[b++] = 128;
            for (e = 0; e + 64 <= b; e += 64) h.push(c(e, 64));
            d = b - e;
            e = c(e, d);
            64 < d + 8 && (h.push(e), e = c(0, 0));
            e[15] = 8 * b - 8;
            h.push(e);
            return h
        }(a)))
    }

    function C(a) {
        a |= 0;
        return 0 > a ? "00" : 16 > a ? "0" + a.toString(16) : 256 > a ? a.toString(16) : "ff"
    }

    function J(a, b, c) {
        c = 0 > c ? c + 6 : 6 < c ? c - 6 : c;
        return C(255 * (1 > c ? a + (b - a) * c : 3 > c ? b : 4 > c ? a + (b - a) * (4 - c) : a))
    }

    function K(a, b, c, d) {
        function f(n, g) {
            var k = h[n];
            k && 1 < k.length || (k = g);
            return function (p) {
                p = k[0] + p * (k[1] - k[0]);
                return 0 > p ? 0 : 1 < p ? 1 : p
            }
        }

        var e = "object" == typeof c && c || a.config || b.jdenticon_config || {}, h = e.lightness || {};
        b = e.saturation || {};
        a = "color" in b ? b.color : b;
        b = b.grayscale;
        var l = e.backColor, q = e.padding;
        return {
            R: function (n) {
                var g = e.hues, k;
                g && 0 < g.length && (k = g[0 | .999 * n * g.length]);
                return "number" == typeof k ? (k / 360 % 1 + 1) % 1 : n
            },
            A: "number" == typeof a ? a : .5,
            J: "number" == typeof b ? b : 0,
            w: f("color", [.4, .8]),
            I: f("grayscale", [.3, .9]),
            F: w.parse(l),
            padding: "number" == typeof c ? c : "number" == typeof q ?
                q : d
        }
    }

    function F(a, b) {
        this.x = a;
        this.y = b
    }

    function B(a, b, c, d) {
        this.b = a;
        this.c = b;
        this.h = c;
        this.a = d
    }

    function L(a, b, c, d, f, e) {
        function h(r, y, W, G, M) {
            G = G ? t(b, G, 1) : 0;
            y = y[t(b, W, 1) % y.length];
            a.G(k[p[r]]);
            for (r = 0; r < M.length; r++) n.c = new B(c + M[r][0] * g, d + M[r][1] * g, g, G++ % 4), y(n, g, r);
            a.H()
        }

        function l(r) {
            if (0 <= r.indexOf(N)) for (var y = 0; y < r.length; y++) if (0 <= p.indexOf(r[y])) return !0
        }

        e.F && a.m(e.F);
        var q = .5 + f * e.padding | 0;
        f -= 2 * q;
        var n = new S(a), g = 0 | f / 4;
        c += 0 | q + f / 2 - 2 * g;
        d += 0 | q + f / 2 - 2 * g;
        f = t(b, -7) / 268435455;
        var k = U(f, e), p = [];
        for (e =
                 0; 3 > e; e++) {
            var N = t(b, 8 + e, 1) % k.length;
            if (l([0, 4]) || l([2, 3])) N = 1;
            p.push(N)
        }
        h(0, O.K, 2, 3, [[1, 0], [2, 0], [2, 3], [1, 3], [0, 1], [3, 1], [3, 2], [0, 2]]);
        h(1, O.K, 4, 5, [[0, 0], [3, 0], [3, 3], [0, 3]]);
        h(2, O.O, 1, null, [[1, 1], [2, 1], [2, 2], [1, 2]]);
        a.finish()
    }

    function D(a, b, c) {
        if ("string" === typeof a) {
            if (m.L) {
                a = document.querySelectorAll(a);
                for (var d = 0; d < a.length; d++) D(a[d], b, c)
            }
        } else if (d = m.B(a)) if (b = z.u(b) || null != b && z.s(b) || z.u(a.getAttribute(m.v)) || a.hasAttribute(m.o) && z.s(a.getAttribute(m.o))) a = d == m.D ? new H(new P(a)) : new I(a.getContext("2d")),
            L(a, b, 0, 0, a.a, K(u, v, c, .08))
    }

    function u() {
        m.L && D(m.C)
    }

    function X() {
        var a = (u.config || v.jdenticon_config || {}).replaceMode;
        "never" != a && (u(), "observe" == a && T(D))
    }

    P.prototype = {
        m: function (a, b) {
            b && A(this.a, "rect", "width", "100%", "height", "100%", "fill", a, "opacity", b)
        }, c: function (a, b) {
            A(this.a, "path", "fill", a, "d", b)
        }
    };
    Q.prototype = {
        m: function (a, b) {
            b && (this.a += '<rect width="100%" height="100%" fill="' + a + '" opacity="' + b.toFixed(2) + '"/>')
        }, c: function (a, b) {
            this.a += '<path fill="' + a + '" d="' + b + '"/>'
        }, toString: function () {
            return this.a +
                "</svg>"
        }
    };
    var m = {
        D: 1,
        N: 2,
        v: "data-jdenticon-hash",
        o: "data-jdenticon-value",
        L: "undefined" !== typeof document && "querySelectorAll" in document,
        B: function (a) {
            if (a) {
                var b = a.tagName;
                if (/svg/i.test(b)) return m.D;
                if (/canvas/i.test(b) && "getContext" in a) return m.N
            }
        }
    };
    m.C = "[" + m.v + "],[" + m.o + "]";
    var O = {
        O: [function (a, b) {
            var c = .42 * b;
            a.f([0, 0, b, 0, b, b - 2 * c, b - c, b, 0, b])
        }, function (a, b) {
            var c = 0 | .5 * b;
            a.b(b - c, 0, c, 0 | .8 * b, 2)
        }, function (a, b) {
            var c = 0 | b / 3;
            a.a(c, c, b - c, b - c)
        }, function (a, b) {
            var c = .1 * b, d = 6 > b ? 1 : 8 > b ? 2 : 0 | .25 * b;
            c = 1 < c ? 0 |
                c : .5 < c ? 1 : c;
            a.a(d, d, b - c - d, b - c - d)
        }, function (a, b) {
            var c = 0 | .15 * b, d = 0 | .5 * b;
            a.g(b - d - c, b - d - c, d)
        }, function (a, b) {
            var c = .1 * b, d = 4 * c;
            3 < d && (d |= 0);
            a.a(0, 0, b, b);
            a.f([d, d, b - c, d, d + (b - d - c) / 2, b - c], !0)
        }, function (a, b) {
            a.f([0, 0, b, 0, b, .7 * b, .4 * b, .4 * b, .7 * b, b, 0, b])
        }, function (a, b) {
            a.b(b / 2, b / 2, b / 2, b / 2, 3)
        }, function (a, b) {
            a.a(0, 0, b, b / 2);
            a.a(0, b / 2, b / 2, b / 2);
            a.b(b / 2, b / 2, b / 2, b / 2, 1)
        }, function (a, b) {
            var c = .14 * b, d = 4 > b ? 1 : 6 > b ? 2 : 0 | .35 * b;
            c = 8 > b ? c : 0 | c;
            a.a(0, 0, b, b);
            a.a(d, d, b - d - c, b - d - c, !0)
        }, function (a, b) {
            var c = .12 * b, d = 3 * c;
            a.a(0, 0, b, b);
            a.g(d, d,
                b - c - d, !0)
        }, function (a, b) {
            a.b(b / 2, b / 2, b / 2, b / 2, 3)
        }, function (a, b) {
            var c = .25 * b;
            a.a(0, 0, b, b);
            a.l(c, c, b - c, b - c, !0)
        }, function (a, b, c) {
            var d = .4 * b;
            c || a.g(d, d, 1.2 * b)
        }], K: [function (a, b) {
            a.b(0, 0, b, b, 0)
        }, function (a, b) {
            a.b(0, b / 2, b, b / 2, 0)
        }, function (a, b) {
            a.l(0, 0, b, b)
        }, function (a, b) {
            var c = b / 6;
            a.g(c, c, b - 2 * c)
        }]
    };
    R.prototype = {
        f: function (a) {
            for (var b = "M" + x(a[0].x) + " " + x(a[0].y), c = 1; c < a.length; c++) b += "L" + x(a[c].x) + " " + x(a[c].y);
            this.j += b + "Z"
        }, g: function (a, b, c) {
            c = c ? 0 : 1;
            var d = x(b / 2), f = x(b);
            this.j += "M" + x(a.x) + " " + x(a.y + b / 2) +
                "a" + d + "," + d + " 0 1," + c + " " + f + ",0a" + d + "," + d + " 0 1," + c + " " + -f + ",0"
        }
    };
    H.prototype = {
        m: function (a) {
            a = /^(#......)(..)?/.exec(a);
            var b = a[2] ? t(a[2], 0) / 255 : 1;
            this.h.m(a[1], b)
        }, G: function (a) {
            this.c = this.b[a] || (this.b[a] = new R)
        }, H: function () {
        }, f: function (a) {
            this.c.f(a)
        }, g: function (a, b, c) {
            this.c.g(a, b, c)
        }, finish: function () {
            for (var a in this.b) this.h.c(a, this.b[a].j)
        }
    };
    I.prototype = {
        m: function (a) {
            var b = this.b, c = this.a;
            b.fillStyle = w.M(a);
            b.fillRect(0, 0, c, c)
        }, G: function (a) {
            this.b.fillStyle = w.M(a);
            this.b.beginPath()
        },
        H: function () {
            this.b.fill()
        }, f: function (a) {
            var b = this.b, c;
            b.moveTo(a[0].x, a[0].y);
            for (c = 1; c < a.length; c++) b.lineTo(a[c].x, a[c].y);
            b.closePath()
        }, g: function (a, b, c) {
            var d = this.b;
            b /= 2;
            d.moveTo(a.x + b, a.y + b);
            d.arc(a.x + b, a.y + b, b, 0, 2 * Math.PI, c);
            d.closePath()
        }, finish: function () {
            this.b.restore()
        }
    };
    S.prototype = {
        f: function (a, b) {
            var c = b ? -2 : 2, d = this.c, f = [];
            for (b = b ? a.length - 2 : 0; b < a.length && 0 <= b; b += c) f.push(d.l(a[b], a[b + 1]));
            this.h.f(f)
        }, g: function (a, b, c, d) {
            a = this.c.l(a, b, c, c);
            this.h.g(a, c, d)
        }, a: function (a, b, c, d,
                        f) {
            this.f([a, b, a + c, b, a + c, b + d, a, b + d], f)
        }, b: function (a, b, c, d, f, e) {
            a = [a + c, b, a + c, b + d, a, b + d, a, b];
            a.splice((f || 0) % 4 * 2, 2);
            this.f(a, e)
        }, l: function (a, b, c, d, f) {
            this.f([a + c / 2, b, a + c, b + d / 2, a + c / 2, b + d, a, b + d / 2], f)
        }
    };
    var z = {
        u: function (a) {
            return /^[0-9a-f]{11,}$/i.test(a) && a
        }, s: function (a) {
            return V(null == a ? "" : "" + a)
        }
    }, w = {
        S: function (a, b, c) {
            return "#" + C(a) + C(b) + C(c)
        }, parse: function (a) {
            if (/^#[0-9a-f]{3,8}$/i.test(a)) {
                if (6 > a.length) {
                    var b = a[1], c = a[2], d = a[3];
                    a = a[4] || "";
                    return "#" + b + b + c + c + d + d + a + a
                }
                if (7 == a.length || 8 < a.length) return a
            }
        },
        M: function (a) {
            var b = t(a, 7, 2);
            if (isNaN(b)) return a;
            var c = t(a, 1, 2), d = t(a, 3, 2);
            a = t(a, 5, 2);
            return "rgba(" + c + "," + d + "," + a + "," + (b / 255).toFixed(2) + ")"
        }, P: function (a, b, c) {
            if (0 == b) return a = C(255 * c), "#" + a + a + a;
            b = .5 >= c ? c * (b + 1) : c + b - c * b;
            c = 2 * c - b;
            return "#" + J(c, b, 6 * a + 2) + J(c, b, 6 * a) + J(c, b, 6 * a - 2)
        }, i: function (a, b, c) {
            var d = [.55, .5, .5, .46, .6, .55, .55][6 * a + .5 | 0];
            return w.P(a, b, .5 > c ? c * d * 2 : d + (c - .5) * (1 - d) * 2)
        }
    };
    B.prototype = {
        l: function (a, b, c, d) {
            var f = this.b + this.h, e = this.c + this.h;
            return 1 === this.a ? new F(f - b - (d || 0), this.c + a) : 2 ===
            this.a ? new F(f - a - (c || 0), e - b - (d || 0)) : 3 === this.a ? new F(this.b + b, e - a - (c || 0)) : new F(this.b + a, this.c + b)
        }
    };
    B.a = new B(0, 0, 0, 0);
    u.drawIcon = function (a, b, c, d) {
        if (!a) throw Error("No canvas specified.");
        a = new I(a, c);
        L(a, z.u(b) || z.s(b), 0, 0, c, K(u, v, d, 0))
    };
    u.toSvg = function (a, b, c) {
        var d = new Q(b), f = new H(d);
        L(f, z.u(a) || z.s(a), 0, 0, b, K(u, v, c, .08));
        return d.toString()
    };
    u.update = D;
    u.version = "2.2.0";
    E && (E.fn.jdenticon = function (a, b) {
        this.each(function (c, d) {
            D(d, a, b)
        });
        return this
    });
    "function" === typeof setTimeout && setTimeout(X,
        0);
    return u
});
//# sourceMappingURL=jdenticon.min.js.map

//# sourceMappingURL=jdenticon-2.2.0.min.js.map
