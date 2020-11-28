let sections = [
  {
    $icon: document.getElementById("icon-date"),
    child: {
      arrival: {
        $el: document.getElementById("arrival"),
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

let error_icon = `
<svg width="1em" height="1em" viewBox="0 0 16 16" fill="rgb(220, 38, 38)" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
</svg>
`;

let sucess_icon = `
<svg width="1em" height="1em" viewBox="0 0 16 16" fill=" rgb(5, 150, 105)" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
</svg>
`;

let info_icon = `
<svg width="1em" height="1em" viewBox="0 0 16 16" fill="rgb(37, 99, 235)" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg>
`;

document.getElementById("icon-info").innerHTML = info_icon;

let date = new Date();
sections[0].child.arrival.$el.value = date.toISOString().split("T")[0];
date.setDate(date.getDate() + 2);
sections[0].child.departure.$el.value = date.toISOString().split("T")[0];

sections.forEach((section) => {
  Object.keys(section.child).forEach((key) => {
    section.$icon.innerHTML = isSectionValid(section)
      ? sucess_icon
      : error_icon;

    section.child[key].$el.addEventListener("focusout", () => {
      if (!section.child[key].state.focusable) {
        section.child[key].state.focusable = true;
        return;
      }
      section.child[key].state.valid = section.child[key].$el.reportValidity();

      section.$icon.innerHTML = isSectionValid(section)
        ? sucess_icon
        : error_icon;
      section.child[key].state.focusable = false;
    });
  });
});

function isSectionValid(section) {
  let section_is_valid = true;
  Object.keys(section.child).forEach(($input) => {
    if (!section.child[$input].$el.checkValidity()) {
      section_is_valid = false;
    } else {
      section.child[$input].state.valid = true;
    }
  });

  return section_is_valid;
}
