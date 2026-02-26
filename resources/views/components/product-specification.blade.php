{{-- Capturing Specification Props --}}
@props(['specification'])
<div class="widget mb-40">
    <div class="widget-title-box mb-30">
        <h3 class="widget-title">Specification</h3>
    </div>
    <ul class="cat">
        <li>
            Usage <span class="f-right">{{ $specification->usage }}</span>
        </li>
        <li>
            Material <span class="f-right">{{ $specification->material }}</span>
        </li>
        <li>
            Weight <span class="f-right">{{ $specification->weight }}</span>
        </li>
        <li>
            Voltage <span class="f-right">{{ $specification->voltage }}</span>
        </li>
        <li>
            Color <span class="f-right">{{ $specification->color }}</span>
        </li>
        <li>
            Frequency <span class="f-right">{{ $specification->frequency }}</span>
        </li>
        <li>
            Temperature <span class="f-right">{{ $specification->temperature }}</span>
        </li>
    </ul>
</div>