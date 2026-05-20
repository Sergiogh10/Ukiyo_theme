import * as React from 'react';
import { EmailLayout } from '../components/EmailLayout';
import { Header } from '../components/Header';
import { Footer } from '../components/Footer';
import { SectionTitle } from '../components/SectionTitle';
import { Paragraph } from '../components/Paragraph';
import { SignatureBlock } from '../components/SignatureBlock';
import { CTAButton } from '../components/CTAButton';
import { Card } from '../components/Card';
import { Section } from '@react-email/components';
import { CommonEmailProps, mockCommonProps } from '../data/mockData';

interface FeedbackRequestEmailProps extends CommonEmailProps {
  tripName?: string;
  formUrl?: string;
}

export const FeedbackRequestEmail = ({
  clientName = '{{CLIENT_NAME}}',
  senderName = mockCommonProps.senderName,
  senderRole = mockCommonProps.senderRole,
  senderPhotoUrl = mockCommonProps.senderPhotoUrl,
  senderEmail = mockCommonProps.senderEmail,
  senderPhone = mockCommonProps.senderPhone,
  supportEmail = mockCommonProps.supportEmail,
  tripName = '{{TRIP_NAME}}',
  formUrl = '{{FORM_URL}}',
}: FeedbackRequestEmailProps) => {
  const previewText = 'Nos ayudará mucho saber cómo ha ido el viaje.';

  return (
    <EmailLayout previewText={previewText}>
      <Header />
      <Section style={{ padding: '0 48px' }}>
        <Card>
          <SectionTitle as="h1">Hola de nuevo, {clientName}</SectionTitle>
          <Paragraph>
            Ahora que acabáis de volver de {tripName}, nos vendrá genial saber cómo lo habéis vivido de verdad.
          </Paragraph>
          <Paragraph>
            Si hubo un alojamiento que os encantó, un guía que marcó la diferencia o algo del ritmo del viaje que cambiaríais, nos ayuda mucho saberlo.
          </Paragraph>
          <Paragraph>
            Podéis responder a este correo con total libertad o, si os resulta más cómodo, completar este formulario breve. Os llevará muy poco.
          </Paragraph>

          <CTAButton href={formUrl}>
            Acceder al formulario de feedback
          </CTAButton>

          <Paragraph>
            Gracias por el viaje compartido y por dedicar unos minutos más a contárnoslo.
          </Paragraph>

          <SignatureBlock 
            name={senderName} 
            role={senderRole} 
            photoUrl={senderPhotoUrl}
            email={senderEmail}
            phone={senderPhone}
          />
        </Card>
      </Section>
      <Footer supportEmail={supportEmail} />
    </EmailLayout>
  );
};

export default FeedbackRequestEmail;
