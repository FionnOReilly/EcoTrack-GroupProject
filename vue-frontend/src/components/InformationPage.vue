<template>
  <section>
        <div class="info-container">
            <img class="bins-img" src="@/assets/images/Solid-Waste-Management.png">

            <div class="info-card">

                <h3 class="module-title"> What is Waste Recycling? </h3>
                <p>

                    Waste recycling is the process of collecting, processing, and converting discarded materials into
                    new products that can be used again, reducing the need for extracting and processing raw materials.
                    This practice plays a critical role in conserving natural resources, reducing greenhouse gas
                    emissions, and minimizing the impact of waste on landfills and ecosystems.

                </p>
                <h4> How Recycling Works </h4>
                <p>

                    Collection and Sorting: Waste is collected from households, businesses, and industrial sources and
                    then transported to recycling centers. Materials are sorted either manually or through automated
                    systems based on their type (plastic, paper, metal, glass, etc.).

                    Processing: After sorting, materials are cleaned and processed into raw forms that manufacturers can
                    use. For example:

                    Plastics are shredded, melted, and reformed into pellets, which can then be molded into new
                    products.

                    Glass is crushed into cullet (small glass pieces), melted, and remade into new containers or other
                    glass products.

                    Paper is pulped, cleaned, and processed into new paper products like newspapers, office paper, or
                    cardboard.

                    Metals such as aluminum and steel are melted down and recast for industrial use, often in cans,
                    vehicles, or construction materials.

                    E-waste (electronic waste) is dismantled to extract valuable metals like copper and gold, as well as
                    plastic and other components.
                </p>

            </div>




            <div class="info-card">

                <h3 class="module-title"> The Environmental Benefits of Recycling </h3>
                <p>
                <ul>
                    <li> <strong>Energy Conservation:</strong> Producing new products from recycled materials consumes
                        significantly less energy than using raw materials. For instance, recycling aluminum saves up to
                        95% of the energy required to produce it from bauxite ore. </li>
                    <li> <strong>Reduction in Greenhouse Gas Emissions:</strong> Recycling reduces emissions from
                        manufacturing processes. Landfilling waste can produce methane, a potent greenhouse gas, so
                        reducing landfill waste also curbs emissions. </li>
                    <li><strong>Resource Preservation: </strong>Recycling extends the life cycle of materials, reducing
                        the need for mining,
                        deforestation, and the extraction of other natural resources. It also reduces the depletion of
                        finite resources like metals and fossil fuels. </li>
                    <li><strong> Waste Reduction:</strong> By keeping more materials out of landfills and incinerators,
                        recycling helps to
                        reduce the volume of waste. Landfills can be hazardous as they can release harmful chemicals
                        into
                        the soil and water, while incinerators contribute to air pollution.</li>
                </ul>
                </p>

            </div>

            <div class="info-card">

                <h3 class="module-title"> What Can Individuals Do to Support Recycling? </h3>
                <p>
                <ul>
                    <li> <strong>Proper Sorting: </strong> Always check local recycling guidelines and ensure that only
                        accepted materials are placed
                        in recycling bins. </li>
                    <li> <strong>Reduce and Reuse:</strong> Reducing waste generation in the first place is the most
                        sustainable option. Reusing items
                        instead of discarding them extends their lifecycle and reduces the need for new resources. </li>
                    <li><strong>Support Circular Economy: </strong>Purchase products made from recycled materials and
                        support companies that engage
                        in sustainable practices. This promotes a "circular economy," where products are continually
                        repurposed,
                        minimizing waste.</li>

                </ul>

                </p>

            </div>




            <div class="info-card">

                <h3 class="module-title"> Recycling Locations in Limerick </h3>
                <p>

                <ul>
                    <li> Limerick offers several locations for recycling, making it easy for residents to contribute to
                        a sustainable
                        waste management system. </li>
                    <li> Mungret Recycling Centre: It is open from Tuesday to Saturday, 10:00 am to 4:45 pm </li>
                    <li> Kilmallock Recycling Centre: Also managed by Limerick City and County Council, this center
                        provides similar
                        services to Mungret, but it is closed on Mondays</li>
                    <li> Newcastle West Civic Amenity Centre: operates on Wednesdays and Saturdays</li>
                </ul>
                </p>
                <img class="maps-img" src="@/assets/images/mapImg.png">
            </div>

        </div>
    </section>
   
</template>


<script>
export default {
  name: 'InformationPage',
};
</script>

<style scoped>
.info-card {
    color: black;
    box-shadow: 0 0 1em darkslategray;
    padding: 2em;
    margin: 30px;
    background-color: #42A5A2;
    transition: transform 0.2s, box-shadow 0.2s; /* Added transition */
}

   .info-card:hover {
    box-shadow: 0 0 2em darkslategray; /* Increased shadow on hover */
    transform: scale(1.02); /* Slight scale effect */
}

 .bins-img, .maps-img {
    max-width: 100%; /* Scale images to fit the container */
    height: auto;    /* Maintain aspect ratio */
    display: block;  /* Prevent extra space below images */
    margin: 0 auto;  /* Center images if needed */
}

    @media  screen and (min-width: 992px) /*desktop */ {
        .info-container {
            display:grid;
            grid-template-columns: auto ;
            margin:auto;
        }
    
    .info-card {
    color: black;
    box-shadow: 0 0 1em darkslategray;
    padding: 2em;
    margin: 30px;
    background-color: #42A5A2;
    transition: transform 0.2s, box-shadow 0.2s; /* Added transition */
}
    }
</style>