import { Section, Text, Row, Column } from '@react-email/components';
import * as React from 'react';
import { theme } from '../styles/theme';

interface ChecklistBlockProps {
  items: string[];
}

export const ChecklistBlock = ({ items }: ChecklistBlockProps) => {
  return (
    <Section style={containerStyle}>
      {items.map((item, index) => (
        <Row key={index} style={rowStyle}>
          <Column style={iconColumn}>
            <Text style={iconStyle}>✓</Text>
          </Column>
          <Column>
            <Text style={textStyle}>{item}</Text>
          </Column>
        </Row>
      ))}
    </Section>
  );
};

const containerStyle = {
  margin: '24px 0',
  width: '100%',
};

const rowStyle = {
  marginBottom: '12px',
};

const iconColumn = {
  width: '30px',
  verticalAlign: 'top',
};

const iconStyle = {
  margin: '0',
  color: theme.colors.success,
  fontSize: '18px',
  fontWeight: 'bold',
  lineHeight: '26px',
};

const textStyle = {
  margin: '0',
  fontSize: '15px',
  lineHeight: '26px',
  color: theme.colors.textMain,
  fontFamily: theme.fonts.main,
};

export default ChecklistBlock;
