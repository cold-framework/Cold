let success = "fa fa-check-circle text-green-600";
let error = "fas fa-circle-notch text-red-600";

let sections = [
  {
    $icon: document.getElementById("icon-date"),
    child: {
      arival: {
        $el: document.getElementById("arival"),
        state: {
          focusable: true,
          valid: false,
        },
      },
      departure: {
        $el: document.getElementById("departure"),
        state: {
          focusable: true,
          valid: false,
        },
      },
    },
  },
  {
    $icon: document.getElementById("icon-number"),
    child: {
      adult: {
        $el: document.getElementById("adult"),
        state: {
          focusable: true,
          valid: false,
        },
      },
      child: {
        $el: document.getElementById("child"),
        state: {
          focusable: true,
          valid: false,
        },
      },
    },
  },
  {
    $icon: document.getElementById("icon-information"),
    child: {
      name: {
        $el: document.getElementById("name"),
        state: {
          focusable: true,
          valid: false,
        },
      },
      surname: {
        $el: document.getElementById("surname"),
        state: {
          focusable: true,
          valid: false,
        },
      },
      email: {
        $el: document.getElementById("email"),
        state: {
          focusable: true,
          valid: false,
        },
      },
      phone: {
        $el: document.getElementById("phone"),
        state: {
          focusable: true,
          valid: false,
        },
      },
      city: {
        $el: document.getElementById("city"),
        state: {
          focusable: true,
          valid: false,
        },
      },
      postal_code: {
        $el: document.getElementById("postal_code"),
        state: {
          focusable: true,
          valid: false,
        },
      },
    },
  },
];

sections.forEach((section) => {
  Object.keys(section.child).forEach((key) => {
    section.child[key].$el.addEventListener("focusout", () => {
      if (!section.child[key].state.focusable) {
        section.child[key].state.focusable = true;
        return;
      }
      section.child[key].state.valid = section.child[key].$el.reportValidity();

      let section_is_valid = true;
      Object.keys(section.child).forEach(($input) => {
        if (!section.child[$input].$el.checkValidity()) {
          section_is_valid = false;
        }
      });

      section.$icon.classList = section_is_valid ? success : error;
      section.child[key].state.focusable = false;
    });
  });
});
