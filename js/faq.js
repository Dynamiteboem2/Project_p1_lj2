// Vind alle accordeons op de pagina
const acc = document.getElementsByClassName("accordion");

// Loop door elk accordeon
Array.from(acc).forEach((accordion) =>
{
  accordion.addEventListener("click", () =>
  {
    const isActive = accordion.classList.contains("active");

    // Verwijder de actieve klasse van alle accordeons
    Array.from(acc).forEach((acc) =>
    {
      acc.classList.remove("active");
      acc.nextElementSibling.style.maxHeight = null;
    });

    if (!isActive)
    {
      // Toon/verberg het bijbehorende paneel
      const panel = accordion.nextElementSibling;
      panel.style.maxHeight = panel.scrollHeight + "px";

      // Voeg de actieve klasse toe aan het geselecteerde accordeon
      accordion.classList.add("active");
    }
  });
});

// Faq
document.addEventListener("alpine:init", () =>
{
  Alpine.store("accordion", {
    tab: 0
  });

  Alpine.data("accordion", (idx) => ({
    init()
    {
      this.idx = idx;
    },
    idx: -1,
    handleClick()
    {
      this.$store.accordion.tab =
        this.$store.accordion.tab === this.idx ? 0 : this.idx;
    },
    handleRotate()
    {
      return this.$store.accordion.tab === this.idx ? "-rotate-180" : "";
    },
    handleToggle()
    {
      return this.$store.accordion.tab === this.idx
        ? `max-height: ${ this.$refs.tab.scrollHeight }px`
        : "";
    }
  }));
});

