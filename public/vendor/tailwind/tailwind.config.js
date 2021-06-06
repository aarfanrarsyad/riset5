module.exports = {
  purge: [
    '../../../app/Views/**/*.php',
    '../../public/**/*.js'
],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      inset: {
        '9.5': '2.375rem',
      },
      colors: {
        primary: "#014F86",
        primaryHover: "#003C75",
        primaryDark: "#015998",
        primaryLight: "#307BB1",
        primarySidebar: "#044878",
        secondary: "#FFAA00",
        secondaryhover: "#FFBB34",
        success: "#54AC00",
        successHover: "#458E00",
        danger: "#C41800",
        redAlert: "#FF7474",
        greenAlert: "#B1FF66",
      },
      fontFamily: {
        heading: ['Poppins'],
        paragraph: ['Cabin'],
      },
      spacing: {
        '18': '4.5rem',
      },
      padding: {
        '22': '5.5rem',
       }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
